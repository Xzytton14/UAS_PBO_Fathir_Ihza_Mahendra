<?php
require_once 'Koneksi.php';
require_once 'MahasiswaMandiri.php';

// 1. Uji Koneksi Database
$db = Koneksi::getKoneksi();

if ($db) {
    echo "<h3>>>> Koneksi ke Database Berhasil! <<<</h3>";
    echo "Database siap digunakan untuk menampung objek PBO PHP.<br><br>";
    echo "--------------------------------------------------------<br>";

    // 2. Membuat Objek Mahasiswa Mandiri
    $mhs1 = new MahasiswaMandiri(
        1, 
        "Fathir Ihza Mahendra", 
        "250102107", 
        2, 
        4500000.00, 
        "Golongan 4", 
        "Suryono"
    );

    // 3. Menampilkan Data Objek ke Browser
    $mhs1->tampilkanProfilGlobal();
    $mhs1->tampilkanSpesifikAkademik();
    
    // Format mata uang rupiah untuk output tagihan
    $tagihanFormat = "Rp " . number_format($mhs1->hitungTagihanSemester(), 2, ',', '.');
    echo "Total Tagihan    : " . $tagihanFormat . "<br>";
}
?>