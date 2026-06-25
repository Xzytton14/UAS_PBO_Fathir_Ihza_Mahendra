<?php
// File: index.php
require_once 'MahasiswaMandiri.php';
require_once 'MahasiswaBidikmisi.php';
require_once 'MahasiswaPrestasi.php';

echo "<h2>UAS PBO - Implementasi Polimorfisme & Inheritance (Multi-File)</h2>";
echo "------------------------------------------------------------------<br>";

// Membuat array objek dari berbagai class anak
$daftarMahasiswa = [
    new MahasiswaMandiri(1, "Fathir Ihza Mahendra", "250102107", 2, 4500000.00, "Golongan 4", "Suryono"),
    new MahasiswaBidikmisi(2, "Indah Permatasari", "250102009", 2, 0.00, "KIP-2025-00192", 700000.00),
    new MahasiswaPrestasi(3, "Rian Hidayat", "250102017", 4, 3000000.00, "Djarum Foundation", 3.50)
];

// Looping untuk eksekusi secara polimorfis
foreach ($daftarMahasiswa as $mhs) {
    $mhs->tampilkanProfilGlobal();
    $mhs->tampilkanSpesifikAkademik();
    
    $tagihanFormat = "Rp " . number_format($mhs->hitungTagihanSemester(), 2, ',', '.');
    echo "<b>Total Tagihan  : " . $tagihanFormat . "</b><br>";
    echo "------------------------------------------------------------------<br>";
}
?>