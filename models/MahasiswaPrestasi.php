<?php
// File: models/MahasiswaPrestasi.php
require_once 'Mahasiswa.php';
require_once __DIR__ . '/../config/Koneksi.php';

class MahasiswaPrestasi extends Mahasiswa {
    // 1. Deklarasi property harus ada
    private $namaInstansiBeasiswa;
    private $minimalIPKSyarat;

    // 2. Constructor harus ada agar menerima 7 argumen
    public function __construct($id, $nama, $nim, $semester, $ukt, $namaInstansiBeasiswa, $minimalIPKSyarat) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIPKSyarat = $minimalIPKSyarat;
    }

    // 3. Method Query
    public static function ambilSemua($keyword = '') {
        try {
            $db = Koneksi::getKoneksi();
            $sql = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiayaan = 'prestasi'";
            
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
                    $row['nama_instansi_beasiswa'], 
                    $row['minimal_ipk_syarat']
                );
            }
            return $list;
        } catch (PDOException $e) {
            die("Error Query Prestasi: " . $e->getMessage());
        }
    }

    public function hitungTagihanSemester() { 
        return $this->getTarifUKTNominal() * 0.25; 
    }

    public function tampilkanSpesifikAkademik() { 
        echo "Sponsor: " . $this->namaInstansiBeasiswa . " <br> Syarat IPK: " . $this->minimalIPKSyarat; 
    }
}
?>