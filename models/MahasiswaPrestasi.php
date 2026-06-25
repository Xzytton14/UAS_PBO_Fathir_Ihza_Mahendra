<?php
// File: MahasiswaPrestasi.php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    private $namaInstansiBeasiswa;
    private $minimalIPKSyarat;

    public function __construct($id, $nama, $nim, $semester, $ukt, $namaInstansiBeasiswa, $minimalIPKSyarat) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIPKSyarat = $minimalIPKSyarat;
    }

    // OVERRIDING: Aturan Prestasi baru (Hanya bayar 25%)
    public function hitungTagihanSemester() {
        return $this->getTarifUKTNominal() * 0.25; 
    }

    public function tampilkanSpesifikAkademik() {
        echo "Jenis Pembiayaan: Beasiswa Prestasi<br>";
        echo "Instansi Pemberi: " . $this->namaInstansiBeasiswa . "<br>";
        echo "Syarat Min. IPK : " . $this->minimalIPKSyarat . "<br>";
    }
}
?>