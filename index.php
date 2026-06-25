<?php
// File: index.php
require_once 'MahasiswaMandiri.php';
require_once 'MahasiswaBidikmisi.php';
require_once 'MahasiswaPrestasi.php';

echo "<h2>UAS PBO - Polimorfisme & Overriding Tagihan</h2>";
echo "------------------------------------------------------------------<br>";

// Membuat list mahasiswa dengan tarif UKT awal masing-masing
$daftarMahasiswa = [
    // UKT Awal: 4.500.000 + 100.000 (Sesuai aturan Mandiri)
    new MahasiswaMandiri(1, "Fathir Ihza Mahendra", "250102107", 2, 4500000.00, "Golongan 4", "Suryono"),
    
    // UKT Awal: 4.000.000 -> Menjadi 0 (Sesuai aturan Bidikmisi)
    new MahasiswaBidikmisi(2, "Indah Permatasari", "250102009", 2, 4000000.00, "KIP-2025-00192", 700000.00),
    
    // UKT Awal: 4.000.000 -> Hanya bayar 25% = 1.000.000 (Sesuai aturan Prestasi)
    new MahasiswaPrestasi(3, "Rian Hidayat", "250102017", 4, 4000000.00, "Djarum Foundation", 3.50)
];

// POLIMORFISME: Mengeksekusi metode overriding secara dinamis
foreach ($daftarMahasiswa as $mhs) {
    $mhs->tampilkanProfilGlobal();
    $mhs->tampilkanSpesifikAkademik();
    
    // Menghitung tagihan berdasarkan metode hasil overriding di kelas anak
    $tagihanAkhir = $mhs->hitungTagihanSemester();
    $tagihanFormat = "Rp " . number_format($tagihanAkhir, 2, ',', '.');
    
    echo "<b>Total Tagihan  : " . $tagihanFormat . "</b><br>";
    echo "------------------------------------------------------------------<br>";
}
?>