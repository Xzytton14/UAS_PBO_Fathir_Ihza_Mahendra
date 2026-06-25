<?php
// File: MahasiswaBidikmisi.php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    private $nomorKIPKuliah;
    private $danaSakuSubsidi;

    public function __construct($id, $nama, $nim, $semester, $ukt, $nomorKIPKuliah, $danaSakuSubsidi) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->nomorKIPKuliah = $nomorKIPKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    // OVERRIDING: Aturan Bidikmisi gratis
    public function hitungTagihanSemester() {
        return 0; 
    }

    public function tampilkanSpesifikAkademik() {
        echo "Jenis Pembiayaan: Bidikmisi / KIP-K<br>";
        echo "Nomor KIP Kuliah: " . $this->nomorKIPKuliah . "<br>";
        echo "Dana Saku/Bulan : Rp " . number_format($this->danaSakuSubsidi, 2, ',', '.') . "<br>";
    }
}
?>