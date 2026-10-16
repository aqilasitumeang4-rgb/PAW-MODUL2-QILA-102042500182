<?php
require 'functions.php';
require 'connect.php';

// TODO 1 (RINGKASAN)
// Hitung jumlah baris di tabel mata_kuliah, materi, dan tugas,
// lalu hitung juga tugas yang statusnya 'Aktif'.
// Simpan hasilnya ke empat variabel di bawah ini (gunakan COUNT, bukan mengambil semua baris).

// 1) Jumlah mata kuliah
$query = "SELECT COUNT(*) AS total FROM mata_kuliah";
$result = mysqli_query($conn, $query);
$jumlah_mata_kuliah = $result ? (int) mysqli_fetch_assoc($result)['total'] : 0;

// 2) Jumlah materi
$query = "SELECT COUNT(*) AS total FROM materi";
$result = mysqli_query($conn, $query);
$jumlah_materi = $result ? (int) mysqli_fetch_assoc($result)['total'] : 0;

// 3) Jumlah tugas
$query = "SELECT COUNT(*) AS total FROM tugas";
$result = mysqli_query($conn, $query);
$jumlah_tugas = $result ? (int) mysqli_fetch_assoc($result)['total'] : 0;

// 4) Jumlah tugas dengan status 'Aktif'
$query = "SELECT COUNT(*) AS total FROM tugas WHERE status = 'Aktif'";
$result = mysqli_query($conn, $query);
$jumlah_tugas_aktif = $result ? (int) mysqli_fetch_assoc($result)['total'] : 0;

$pilihan_mk = pilihan_mata_kuliah($conn);

$judul = 'Beranda';
require 'header.php';
?>
<p class="eyebrow">Learning Management System</p>
<h1 class="hero">Kelola perkuliahan dalam satu tempat.</h1>
<p class="muted">Pengelolaan mata kuliah, materi pembelajaran, dan tugas.</p>

<div class="stats">
    <a class="card stat" href="mata_kuliah.php">
        <b><?= (int) $jumlah_mata_kuliah ?></b>
        <span>Mata Kuliah</span>
    </a>
    <a class="card stat" href="materi.php">
        <b><?= (int) $jumlah_materi ?></b>
        <span>Materi</span>
    </a>
    <a class="card stat" href="tugas.php">
        <b><?= (int) $jumlah_tugas ?></b>
        <span>Tugas</span>
    </a>
    <a class="card stat" href="tugas.php?status=Aktif">
        <b><?= (int) $jumlah_tugas_aktif ?></b>
        <span>Tugas Aktif</span>
    </a>
</div>

<?php require 'footer.php'; ?>