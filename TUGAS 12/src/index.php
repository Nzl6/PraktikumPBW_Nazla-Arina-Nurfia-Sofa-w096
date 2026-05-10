<?php
session_start();

if (empty($_SESSION['is_logged_in'])) {
    header('Location: login.html?type=error&message=' . urlencode('Silakan login atau signup terlebih dahulu.'));
    exit;
}

$namaUser = $_SESSION['user_nama'] ?? 'User';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Daftarin</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    <nav class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
        <div class="mx-auto flex h-16 w-full max-w-6xl items-center justify-between px-4">
            <a href="./index.php" class="text-lg font-extrabold text-blue-700">DAFTARIN</a>
            <div class="flex items-center gap-2 text-sm font-semibold">
                <span class="hidden rounded-lg bg-slate-100 px-3 py-2 text-slate-700 md:inline">Halo, <?= htmlspecialchars($namaUser, ENT_QUOTES, 'UTF-8'); ?></span>
                <a href="./form.html" class="rounded-lg bg-blue-600 px-4 py-2 text-white transition hover:bg-blue-700">Pendaftaran</a>
                <a href="./logout.php" class="rounded-lg px-3 py-2 text-slate-700 transition hover:bg-red-50 hover:text-red-700">Logout</a>
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-4 py-12">
        <section class="rounded-2xl bg-white p-8 shadow-sm">
            <h1 class="text-2xl font-extrabold text-slate-900">Beranda Daftarin</h1>
            <p class="mt-2 text-sm text-slate-600">
                Selamat datang, <?= htmlspecialchars($namaUser, ENT_QUOTES, 'UTF-8'); ?>.
                Kamu sudah berhasil login. Lanjutkan ke menu pendaftaran untuk mengisi formulir.
            </p>
            <div class="mt-6">
                <a href="./form.html" class="inline-flex rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                    Isi Form Pendaftaran
                </a>
            </div>
        </section>
    </main>
</body>
</html>
