<?php
// File: models/MahasiswaBidikmisi.php
require_once 'Mahasiswa.php';
require_once __DIR__ . '/../config/Koneksi.php';

class MahasiswaBidikmisi extends Mahasiswa {
    private $nomorKIPKuliah;
    private $danaSakuSubsidi;

    public function __construct($id, $nama, $nim, $semester, $ukt, $nomorKIPKuliah, $danaSakuSubsidi) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->nomorKIPKuliah = $nomorKIPKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    // METHOD QUERY SELECT-WHERE SPESIFIK BIDIKMISI
    public static function ambilSemua() {
        try {
            $db = Koneksi::getKoneksi();
            $stmt = $db->prepare("SELECT * FROM tabel_mahasiswa WHERE jenis_pembiayaan = 'bidikmisi'");
            $stmt->execute();

            $list = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $list[] = new self(
                    $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                    $row['semester'], $row['tarif_ukt_nominal'], 
                    $row['nomor_KIP_kuliah'], $row['dana_saku_subsidi']
                );
            }
            return $list;
        } catch (PDOException $e) {
            die("Error Query Bidikmisi: " . $e->getMessage());
        }
    }

    public function hitungTagihanSemester() {
        return 0; 
    }

    public function tampilkanSpesifikAkademik() {
        echo "No KIP-K: " . $this->nomorKIPKuliah . " <br> Dana Saku: Rp " . number_format($this->danaSakuSubsidi, 0, ',', '.');
    }
}
?>