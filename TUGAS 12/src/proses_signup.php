<?php
require_once __DIR__ . '/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup.html?type=error&message=' . urlencode('Metode request tidak valid.'));
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

if ($nama === '' || $email === '' || $password === '' || $confirmPassword === '') {
    header('Location: signup.html?type=error&message=' . urlencode('Semua field wajib diisi.'));
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: signup.html?type=error&message=' . urlencode('Format email tidak valid.'));
    exit;
}

if (strlen($password) < 8) {
    header('Location: signup.html?type=error&message=' . urlencode('Password minimal 8 karakter.'));
    exit;
}

if ($password !== $confirmPassword) {
    header('Location: signup.html?type=error&message=' . urlencode('Konfirmasi password tidak sama.'));
    exit;
}

$checkStmt = $conn->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
$checkStmt->bind_param('s', $email);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    $checkStmt->close();
    header('Location: signup.html?type=error&message=' . urlencode('Email sudah terdaftar, silakan login.'));
    exit;
}
$checkStmt->close();

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$insertStmt = $conn->prepare('INSERT INTO users (nama, email, password_hash) VALUES (?, ?, ?)');
$insertStmt->bind_param('sss', $nama, $email, $passwordHash);

if ($insertStmt->execute()) {
    $insertStmt->close();
    header('Location: login.html?type=success&message=' . urlencode('Akun berhasil dibuat. Silakan login.'));
    exit;
}

$insertStmt->close();
header('Location: signup.html?type=error&message=' . urlencode('Gagal membuat akun. Coba lagi.'));
exit;

?>
