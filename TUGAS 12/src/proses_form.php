<?php
require_once __DIR__ . '/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.html?type=error&message=' . urlencode('Metode request tidak valid.'));
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$npm = trim($_POST['npm'] ?? '');
$tempatLahir = trim($_POST['tempat_lahir'] ?? '');
$tanggalLahir = trim($_POST['tanggal_lahir'] ?? '');
$jenisKelamin = trim($_POST['jenis_kelamin'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');
$email = trim($_POST['email'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$fakultas = trim($_POST['fakultas'] ?? '');
$agama = trim($_POST['agama'] ?? '');
$divisi = trim($_POST['divisi'] ?? '');
$alasan = trim($_POST['alasan'] ?? '');

$requiredFields = [
    $nama, $npm, $tempatLahir, $tanggalLahir, $jenisKelamin, $alamat,
    $noHp, $email, $prodi, $fakultas, $agama, $divisi, $alasan
];

foreach ($requiredFields as $field) {
    if ($field === '') {
        header('Location: form.html?type=error&message=' . urlencode('Semua field wajib diisi.'));
        exit;
    }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: form.html?type=error&message=' . urlencode('Format email tidak valid.'));
    exit;
}

$stmt = $conn->prepare(
    'INSERT INTO pendaftaran 
    (nama, npm, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, no_hp, email, prodi, fakultas, agama, divisi, alasan)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
);

$stmt->bind_param(
    'sssssssssssss',
    $nama,
    $npm,
    $tempatLahir,
    $tanggalLahir,
    $jenisKelamin,
    $alamat,
    $noHp,
    $email,
    $prodi,
    $fakultas,
    $agama,
    $divisi,
    $alasan
);

if ($stmt->execute()) {
    $stmt->close();
    header('Location: form.html?type=success&message=' . urlencode('Data pendaftaran berhasil disimpan.'));
    exit;
}

$stmt->close();
header('Location: form.html?type=error&message=' . urlencode('Gagal menyimpan data pendaftaran.'));
exit;

?>
