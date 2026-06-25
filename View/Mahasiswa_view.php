<?php
// File: view/mahasiswa_view.php
require_once '../models/MahasiswaMandiri.php';
require_once '../models/MahasiswaBidikmisi.php';
require_once '../models/MahasiswaPrestasi.php';

// Menangkap keyword pencarian jika ada
$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : '';

// Mengoper keyword pencarian ke dalam model masing-masing
$dataMandiri   = MahasiswaMandiri::ambilSemua($keyword);
$dataBidikmisi = MahasiswaBidikmisi::ambilSemua($keyword);
$dataPrestasi  = MahasiswaPrestasi::ambilSemua($keyword);

$daftarMahasiswa = array_merge($dataMandiri, $dataBidikmisi, $dataPrestasi);

// Hitung ulang statistik secara dinamis berdasarkan hasil pencarian
$totalTagihanKampus = 0;
$jumlahMandiri = count($dataMandiri);
$jumlahBidikmisi = count($dataBidikmisi);
$jumlahPrestasi = count($dataPrestasi);

foreach ($daftarMahasiswa as $mhs) {
    $totalTagihanKampus += $mhs->hitungTagihanSemester();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa - PBO Polimorfisme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .card-stats { border-left: 5px solid; }
    </style>
</head>
<body>
<div class="container my-5">
    
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold text-dark m-0">Sistem Keuangan Mahasiswa</h2>
        </div>
        <div class="col-md-6">
            <form method="GET" action="">
                <div class="input-group shadow-sm">
                    <input type="text" name="cari" class="form-control" placeholder="Cari nama mahasiswa..." value="<?= htmlspecialchars($keyword); ?>">
                    <button class="btn btn-primary" type="submit">Cari</button>
                    <?php if (!empty($keyword)): ?>
                        <a href="mahasiswa_view.php" class="btn btn-secondary">Reset</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card card-stats border-warning shadow-sm mb-3">
                <div class="card-body">
                    <small class="text-muted fw-bold">MAHASISWA MANDIRI</small>
                    <h3 class="fw-bold text-warning"><?= $jumlahMandiri; ?> <span class="text-muted fs-6">Orang</span></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats border-success shadow-sm mb-3">
                <div class="card-body">
                    <small class="text-muted fw-bold">MAHASISWA BIDIKMISI</small>
                    <h3 class="fw-bold text-success"><?= $jumlahBidikmisi; ?> <span class="text-muted fs-6">Orang</span></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats border-info shadow-sm mb-3">
                <div class="card-body">
                    <small class="text-muted fw-bold">MAHASISWA PRESTASI</small>
                    <h3 class="fw-bold text-info"><?= $jumlahPrestasi; ?> <span class="text-muted fs-6">Orang</span></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats border-primary shadow-sm mb-3">
                <div class="card-body">
                    <small class="text-muted fw-bold">TOTAL DANA UKT MASUK</small>
                    <h4 class="fw-bold text-primary">Rp <?= number_format($totalTagihanKampus, 0, ',', '.'); ?></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white py-3">
            <h5 class="m-0 fw-bold">Daftar Manunggal Mahasiswa (Total: <?= count($daftarMahasiswa); ?> Baris)</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle m-0">
                <thead class="table-light text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama / NIM</th>
                        <th width="8%">Semester</th>
                        <th width="15%">Jenis Pembiayaan</th>
                        <th width="25%">Detail Khusus Akademik</th>
                        <th width="12%">Tarif Awal</th>
                        <th width="12%">Tagihan Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarMahasiswa)): ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Data nama "<b><?= htmlspecialchars($keyword) ?></b>" tidak ditemukan.</td>
                    </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($daftarMahasiswa as $mhs): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $no++; ?></td>
                            <td>
                                <span class="fw-bold text-primary"><?= htmlspecialchars($mhs->getNamaMahasiswa()); ?></span><br>
                                <small class="text-muted">NIM: <?= htmlspecialchars($mhs->getNim()); ?></small>
                            </td>
                            <td class="text-center"><?= $mhs->getSemester(); ?></td>
                            <td class="text-center">
                                <span class="badge bg-opacity-75 <?= $mhs instanceof MahasiswaMandiri ? 'bg-warning text-dark' : ($mhs instanceof MahasiswaBidikmisi ? 'bg-success' : 'bg-info text-dark') ?>">
                                    <?= strtoupper(str_replace('Mahasiswa', '', get_class($mhs))) ?>
                                </span>
                            </td>
                            <td>
                                <small><?php $mhs->tampilkanSpesifikAkademik(); ?></small>
                            </td>
                            <td class="text-end">Rp <?= number_format($mhs->getTarifUKTNominal(), 0, ',', '.'); ?></td>
                            <td class="text-end fw-bold text-success">Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>