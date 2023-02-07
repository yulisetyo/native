<?php
class Pekerja
{
    private $namaDepan;
    private $namaBelakang;
    private $umur;

    public function __construct($namaDepan, $namaBelakang, $umur)
    {
        $this->namaDepan = $namaDepan;
        $this->namaBelakang = $namaBelakang;
        $this->umur = $umur;
    }

    public function getNamaDepan()
    {
        return $this->namaDepan;
    }

    public function getNamaBelakang()
    {
        return $this->namaBelakang;
    }

    public function getUmur()
    {
        return $this->umur;
    }

}

//instance of class
$objPekerja = new Pekerja('John ', 'Doe ', 23);
echo "nama depan : ".$objPekerja->getNamaDepan().'<br/>';
echo "nama belakang : ".$objPekerja->getNamaBelakang().'<br/>';
echo "umur : ".$objPekerja->getUmur().'<br/>';