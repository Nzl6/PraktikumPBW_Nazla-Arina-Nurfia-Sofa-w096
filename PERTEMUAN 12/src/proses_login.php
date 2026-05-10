<?php
include 'koneksi.php';

header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

// ─── Database config ──────────────────────────────────────
define('DB_HOST', 'localhost');
define('DB_NAME', 'eduregis_db');
define('DB_USER', 'root');          // ganti sesuai konfigurasi
define('DB_PASS', '');              // ganti sesuai konfigurasi
define('DB_CHARSET', 'utf8mb4');

// ─── Helpers ──────────────────────────────────────────────
function jsonResponse(bool $success, string $message, array $extra = []): void {
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $extra));
    exit;
}

// ─── Only accept POST ─────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Metode tidak diizinkan.');
}

// ─── Sanitize & validate input ────────────────────────────
$email    = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonResponse(false, 'Format email tidak valid.');
}

if (strlen($password) < 8) {
    jsonResponse(false, 'Kata sandi minimal 8 karakter.');
}

// ─── Connect to database ──────────────────────────────────
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    // Jangan ekspos detail error ke client
    error_log('DB Connection Error: ' . $e->getMessage());
    jsonResponse(false, 'Gagal terhubung ke server. Coba lagi nanti.');
}

// ─── Look up user ─────────────────────────────────────────
$stmt = $pdo->prepare('SELECT id, name, email, password_hash, is_active FROM users WHERE email = ? LIMIT 1');
$stmt->execute([$email]);
$user = $stmt->fetch();

// Constant-time comparison to prevent timing attacks
if (!$user || !password_verify($password, $user['password_hash'])) {
    jsonResponse(false, 'Email atau kata sandi salah.');
}

if (!$user['is_active']) {
    jsonResponse(false, 'Akun Anda belum aktif. Cek email konfirmasi Anda.');
}

// ─── Rehash if needed (PHP 8+ best practice) ──────────────
if (password_needs_rehash($user['password_hash'], PASSWORD_DEFAULT)) {
    $newHash = password_hash($password, PASSWORD_DEFAULT);
    $pdo->prepare('UPDATE users SET password_hash = ? WHERE id = ?')
        ->execute([$newHash, $user['id']]);
}

// ─── Start session ────────────────────────────────────────
session_start();
session_regenerate_id(true); // prevent session fixation

$_SESSION['user_id']   = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_email'] = $user['email'];
$_SESSION['logged_in'] = true;

// ─── Success ──────────────────────────────────────────────
jsonResponse(true, 'Login berhasil.', [
    'redirect' => 'dashboard.php',
    'name'     => $user['name'],
]);
