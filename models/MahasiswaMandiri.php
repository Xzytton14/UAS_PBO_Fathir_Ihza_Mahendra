<?php
// File: models/MahasiswaMandiri.php
require_once 'Mahasiswa.php';
require_once __DIR__ . '/../config/Koneksi.php'; // Keluar folder models, masuk ke config

class MahasiswaMandiri extends Mahasiswa {
    private $golonganUkt;
    private $namaWali;

    public function __construct($id, $nama, $nim, $semester, $ukt, $golonganUkt, $namaWali) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // METHOD QUERY SELECT-WHERE SPESIFIK MANDIRI
    public static function ambilSemua() {
        try {
            $db = Koneksi::getKoneksi();
            $stmt = $db->prepare("SELECT * FROM tabel_mahasiswa WHERE jenis_pembiayaan = 'mandiri'");
            $stmt->execute();

            $list = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $list[] = new self(
                    $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                    $row['semester'], $row['tarif_ukt_nominal'], 
                    $row['golongan_ukt'], $row['nama_wali']
                );
            }
            return $list;
        } catch (PDOException $e) {
            die("Error Query Mandiri: " . $e->getMessage());
        }
    }

    public function hitungTagihanSemester() {
        return $this->getTarifUKTNominal() + 100000; 
    }

    public function tampilkanSpesifikAkademik() {
        echo "Golongan UKT: " . $this->golonganUkt . " <br> Nama Wali: " . $this->namaWali;
    }
}
?>