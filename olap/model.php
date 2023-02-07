<?php 

function my_autoloader($class)
{
	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.$class.'.php';
}

spl_autoload_register('my_autoloader');

class Model extends Conn {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function getDebitur()
	{
		$param = [];
		$partition = "";
		
		if(isset($_GET['tahun'])) {
			$tahun = htmlentities($_GET['tahun']);
			$param['tahun'] = " AND TO_CHAR (d.tgl_upload, 'yyyy') = '".$tahun."' "; 
		} else {
			return "parameter tahun wajib ada";
		}
		
		if(isset($_GET['kdbank'])) {
			$kdbank = htmlentities($_GET['kdbank']);
			$param['kdbank'] = " AND d.kode_bank = '".$kdbank."' ";
			$partition = "PARTITION(BANK".$kdbank.")";
		} else {
			return "parameter kdbank wajib ada";
		}
		
		if(isset($_GET['nik'])) {
			$nik = htmlentities($_GET['nik']);
			$param['nik'] = " AND d.nik = '".$nik."' "; 
		} 
		
		if(isset($_GET['uus'])) {
			$param['uus'] = " AND d.is_uus = '1' "; 
		}
		
		$where_and = implode("", $param);
		
		$conn = $this->link;
		
		$query = "
			  SELECT d.kode_bank,
					 nik,
					 UPPER (d.nama) nama,
					 npwp,
					 n.deskripsi AS pendidikan,
					 j.deskripsi AS pekerjaan,
					 m.nama AS jns_kelamin,
					 TO_CHAR (d.tgl_lahir, 'yyyy-mm-dd') tgl_lahir,
					 UPPER (k.nama_bank) nama_bank,
					 d.kode_kabkota,
					 UPPER (w.nama_wilayah) nama_wilayah,
					 d.jml_kredit,
					 d.ijin_usaha,
					 d.modal_usaha,
					 d.is_uus,
					 TO_CHAR (tgl_upload, 'yyyy-mm-dd hh24:mi:ss') tgl_upload
				FROM kur_t_debitur ".$partition." d
					 LEFT JOIN kur_r_pekerjaan j
						ON (d.pekerjaan = j.pekerjaan)
					 LEFT JOIN kur_r_bank k
						ON (d.kode_bank = k.kode_bank)
					 LEFT JOIN kur_r_jenis_kelamin m
						ON (d.jns_kelamin = m.kode)
					 LEFT JOIN kur_r_pendidikan n
						ON (d.pendidikan = n.pendidikan)
					 LEFT JOIN kur_r_wilayah w
					    ON (d.kode_kabkota = w.kode_wilayah)
			   WHERE     d.is_api = 1
					 ".htmlentities($where_and)."
			ORDER BY kode_kabkota ASC, nik ASC, nama ASC
		";
		
		$stid = oci_parse($conn, $query);
		oci_execute($stid);
		
		while($rows = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
			$data[] = array(
				'kode_bank' => $rows['KODE_BANK'],
				'nama_bank' => $rows['NAMA_BANK'],
				'nik' => $rows['NIK'],
				'nama' => $rows['NAMA'],
				'npwp' => $rows['NPWP'],
				'nama_kabkota' => $rows['NAMA_WILAYAH'],
				'kode_kabkota' => $rows['KODE_KABKOTA'],
				'pendidikan' => $rows['PENDIDIKAN'],
				'pekerjaan' => $rows['PEKERJAAN'],
				'jml_kredit' => $rows['JML_KREDIT'],
				'ijin_usaha' => $rows['IJIN_USAHA'],
				'modal_usaha' => $rows['MODAL_USAHA'],
				'tgl_upload' => $rows['TGL_UPLOAD'],
			);
		}
		
		oci_free_statement($stid);
		oci_close($conn);
		
		if(isset($data)){
			return $data;
		} else {
			return [];
		}
	}
	
	
	public function getBank()
	{
		$conn = $this->link;
		
		$query = "
			  SELECT kode_bank, UPPER (nama_bank) nama_bank
				FROM kur_r_bank
			ORDER BY kode_bank ASC
		";
		
		$stid = oci_parse($conn, $query);
		oci_execute($stid);
		
		while($rows = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
			$data[] = array(
				'kode_bank' => $rows['KODE_BANK'],
				'nama_bank' => $rows['NAMA_BANK']
			);
		}
		
		oci_free_statement($stid);
		oci_close($conn);
		
		if(isset($data)){
			return $data;
		} else {
			return [];
		}
	}
	
	
	public function dataMasterAkad()
	{
		return "
			SELECT a.tahun,
				   a.bulan,
				   c.nama_bulan,
				   a.kode_bank,
				   b.nama_bank,
				   a.skema,
				   d.nama_skema,
				   a.kode_prov,
				   f.nama_prov,
				   a.kode_kabkota,
				   e.nama_kabkota,
				   a.nilai_akad
			  FROM (SELECT TO_CHAR (a.tgl_akad, 'yyyy') tahun,
						   TO_CHAR (a.tgl_akad, 'mm') bulan,
						   a.kode_bank,
						   SUBSTR (a.skema, 1, 1) skema,
						   a.nilai_akad,
						   b.kode_kabkota,
						   SUBSTR (b.kode_kabkota, 1, 2) kode_prov,
						   b.pekerjaan
					  FROM    kur_t_akad a
						   LEFT JOIN
							  (SELECT kode_bank,
									  nik,
									  kode_kabkota,
									  pekerjaan
								 FROM kur_t_debitur) b
						   ON (a.kode_bank = b.kode_bank AND a.nik = b.nik)
					 WHERE     a.kode_bank NOT IN ('002', '008', '009')
						   AND TO_NUMBER (TO_CHAR (a.tgl_akad, 'yyyy')) >= 2017) a
				   LEFT JOIN (SELECT kode_bank, UPPER (nama_bank) nama_bank
								FROM kur_r_bank) b
					  ON (a.kode_bank = b.kode_bank)
				   LEFT JOIN (SELECT periode, UPPER (bulan1) nama_bulan
								FROM kur_r_periode) c
					  ON (a.bulan = c.periode)
				   LEFT JOIN (SELECT kdskema, skema_parent AS nama_skema FROM kur_r_skema) d
					  ON (a.skema = d.kdskema)
				   LEFT JOIN (SELECT kode_wilayah AS kode_kabkota,
									 UPPER (nama_wilayah) nama_kabkota
								FROM kur_r_wilayah) e
					  ON (a.kode_kabkota = e.kode_kabkota)
				   LEFT JOIN (SELECT kode_wilayah AS kode_prov,
									 UPPER (nama_wilayah) nama_prov
								FROM kur_r_wilayah_propinsi) f
					  ON (a.kode_prov = f.kode_prov)
		";
	}
	
	
	public function getAkad()
	{
		$param = array();
		$partition = "";
		
		if(isset($_GET['tahun'])) {
			$tahun = htmlentities($_GET['tahun']);
			$param['tahun'] = " AND a.tahun = '".$tahun."' "; 
		}
		
		if(isset($_GET['bulan'])) {
			$bulan = htmlentities($_GET['bulan']);
			$param['bulan'] = " AND a.bulan = '".$bulan."' "; 
		}
		
		if(isset($_GET['kdprov'])) {
			$kdprov = htmlentities($_GET['kdprov']);
			$param['kdprov'] = " AND a.kode_prov = '".$kdprov."' "; 
		}
		
		if(isset($_GET['kdbank'])) {
			$kdbank = htmlentities($_GET['kdbank']);
			$param['kdbank'] = " AND a.kode_bank = '".$kdbank."' ";
			$partition = "PARTITION (BANK".$kdbank.")";
		}
		
		$where_and = implode("", $param);

		$conn = $this->link;
		
		$query = "
			  SELECT tahun, bulan, nama_bulan, kode_prov, NVL (nama_prov, 'N/A') nama_prov, COUNT (nilai_akad) jml_akad, SUM (nilai_akad) nilai_akad
			    FROM (".$this->dataMasterAkad().") a
			   WHERE a.kode_bank IS NOT NULL ".htmlentities($where_and)."
			GROUP BY tahun, bulan, nama_bulan, kode_prov, nama_prov
			ORDER BY tahun, bulan, kode_prov
		";
		
		$stid = oci_parse($conn, $query);
		oci_execute($stid);
		
		while($rows = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
			$data[] = array(
				'tahun' => $rows['TAHUN'],
				'bulan' => $rows['BULAN'],
				'nama_bulan' => $rows['NAMA_BULAN'],
				'kode_prov' => $rows['KODE_PROV'],
				'nama_prov' => $rows['NAMA_PROV'],
				'jml_akad' => number_format($rows['JML_AKAD'], 0, ',', '.'),
				'nilai_akad' => number_format($rows['NILAI_AKAD'], 0, ',', '.'),
			);
		}
		
		oci_free_statement($stid);
		oci_close($conn);
		
		if(isset($data)){
			return json_decode(json_encode($data), FALSE);
		} else {
			return json_decode(json_encode([]), FALSE);
		}
	}
	
	public function getPenyaluran()
	{
		$conn = $this->link;
		
		$data = [];
		
		$query = "
			  SELECT kode_bank,
					 nama_bank,
					 tahun,
					 SUM (jml_debitur) jml_debitur,
					 SUM (jml_penyaluran) jml_penyaluran,
					 SUM (jml_outstanding) jml_outstanding
				FROM kur_a_custom_report
			   WHERE tahun >= '2016'
			GROUP BY kode_bank, nama_bank, tahun
			ORDER BY kode_bank, nama_bank, tahun
		";
		
		$stid = oci_parse($conn, $query);
		oci_execute($stid);
		
		while($rows = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
			//~ $data[] = array(
				//~ 'tahun' => $rows['TAHUN'],
				//~ 'bulan' => $rows['BULAN'],
				//~ 'nama_bulan' => $rows['NAMA_BULAN'],
				//~ 'kode_prov' => $rows['KODE_PROV'],
				//~ 'nama_prov' => $rows['NAMA_PROV'],
				//~ 'jml_akad' => number_format($rows['JML_AKAD'], 0, ',', '.'),
				//~ 'nilai_akad' => number_format($rows['NILAI_AKAD'], 0, ',', '.'),
			//~ );
			$data[] = array($rows['KODE_BANK']);
		}
		
		oci_free_statement($stid);
		oci_close($conn);
		
		return $data;
	}
}
