<?php
// File: MahasiswaMandiri.php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    private $golonganUkt;
    private $namaWali;

    public function __construct($id, $nama, $nim, $semester, $ukt, $golonganUkt, $namaWali) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // OVERRIDING: Aturan Mandiri baru
    public function hitungTagihanSemester() {
        return $this->getTarifUKTNominal() + 100000; 
    }

    public function tampilkanSpesifikAkademik() {
        echo "Jenis Pembiayaan: Mandiri<br>";
        echo "Golongan UKT    : " . $this->golonganUkt . "<br>";
        echo "Nama Wali       : " . $this->namaWali . "<br>";
    }
}
?>