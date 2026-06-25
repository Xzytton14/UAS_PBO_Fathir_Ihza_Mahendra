<?php
// File: models/MahasiswaMandiri.php
require_once 'Mahasiswa.php';
require_once __DIR__ . '/../config/Koneksi.php';

class MahasiswaMandiri extends Mahasiswa {
    // 1. Deklarasi property harus ada
    private $golonganUkt;
    private $namaWali;

    // 2. Constructor harus ada agar menerima 7 argumen
    public function __construct($id, $nama, $nim, $semester, $ukt, $golonganUkt, $namaWali) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // 3. Method Query
    public static function ambilSemua($keyword = '') {
        try {
            $db = Koneksi::getKoneksi();
            $sql = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiayaan = 'mandiri'";
            
            if (!empty($keyword)) {
                $sql .= " AND nama_mahasiswa LIKE :keyword";
            }
            
            $stmt = $db->prepare($sql);
            
            if (!empty($keyword)) {
                $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
            }
            
            $stmt->execute();

            $list = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $list[] = new self(
                    $row['id_mahasiswa'], 
                    $row['nama_mahasiswa'], 
                    $row['nim'], 
                    $row['semester'], 
                    $row['tarif_ukt_nominal'], 
                    $row['golongan_ukt'], 
                    $row['nama_wali']
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