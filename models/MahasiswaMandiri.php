<?php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    private $golonganUkt;
    private $namaWali;

    public function __construct($id, $nama, $nim, $semester, $ukt, $golonganUkt, $namaWali) {
        // Memanggil constructor milik class induk (Mahasiswa)
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // Override metode abstrak hitungTagihanSemester
    public function hitungTagihanSemester() {
        return $this->getTarifUKTNominal(); // Mandiri membayar full sesuai nominal UKT
    }

    // Override metode abstrak tampilkanSpesifikAkademik
    public function tampilkanSpesifikAkademik() {
        echo "Jenis Pembiayaan: Mandiri<br>";
        echo "Golongan UKT    : " . $this->golonganUkt . "<br>";
        echo "Nama Wali       : " . $this->namaWali . "<br>";
    }
}
?>