<?php

class AngkaClass {

	public function terbilang($nilai)
	{

        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

        if($nilai==0){

            return "kosong";

        }elseif ($nilai < 12&$nilai!=0) {

            return "" . $huruf[$nilai];

        } elseif ($nilai < 20) {

            return terbilang($nilai - 10) . " belas ";

        } elseif ($nilai < 100) {

            return $this->terbilang($nilai / 10) . " puluh " . $this->terbilang($nilai % 10);

        } elseif ($nilai < 200) {

            return " seratus " . $this->terbilang($nilai - 100);

        } elseif ($nilai < 1000) {

            return $this->terbilang($nilai / 100) . " ratus " . $this->terbilang($nilai % 100);

        } elseif ($nilai < 2000) {

            return " seribu " . $this->terbilang($nilai - 1000);

        } elseif ($nilai < 1000000) {

            return $this->terbilang($nilai / 1000) . " ribu " . $this->terbilang($nilai % 1000);

        } elseif ($nilai < 1000000000) {

            return $this->terbilang($nilai / 1000000) . " juta " . $this->terbilang($nilai % 1000000);

        }elseif ($nilai < 1000000000000) {

            return $this->terbilang($nilai / 1000000000) . " milyar " . $this->terbilang($nilai % 1000000000);

        }elseif ($nilai < 100000000000000) {

            return $this->terbilang($nilai / 1000000000000) . " trilyun " . $this->terbilang($nilai % 1000000000000);

        }elseif ($nilai <= 100000000000000) {

            return "Maaf Tidak Dapat di Prose Karena Jumlah nilai Terlalu Besar ";

        }
	}
}
$angka = 987654321;
$obj = new AngkaClass();
echo "angka : ". $angka. "<br/>";
echo "angka dalam huruf: ".$obj->terbilang($angka);
