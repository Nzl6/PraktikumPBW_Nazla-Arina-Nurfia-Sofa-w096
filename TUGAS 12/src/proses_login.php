<?php
session_start();
require_once __DIR__ . '/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.html?type=error&message=' . urlencode('Metode request tidak valid.'));
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    header('Location: login.html?type=error&message=' . urlencode('Email dan password wajib diisi.'));
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: login.html?type=error&message=' . urlencode('Format email tidak valid.'));
    exit;
}

$stmt = $conn->prepare('SELECT id, nama, email, password_hash FROM users WHERE email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user || !password_verify($password, $user['password_hash'])) {
    header('Location: login.html?type=error&message=' . urlencode('Email atau password salah.'));
    exit;
}

session_regenerate_id(true);
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_nama'] = $user['nama'];
$_SESSION['user_email'] = $user['email'];
$_SESSION['is_logged_in'] = true;

header('Location: index.php');
exit;

?>
