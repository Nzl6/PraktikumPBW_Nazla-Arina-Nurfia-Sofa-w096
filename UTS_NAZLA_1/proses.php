<?php

define("PAJAK", 0.1); // 10%

// Tentukan metode
$metode = $_POST['metode'] ?? 'POST';

// Ambil data
$nama = $_POST['nama'] ?? '';
$nim = $_POST['nim'] ?? '';
$email = $_POST['email'] ?? '';
$layanan = $_POST['layanan'] ?? '';
$barangDipilih = $_POST['barang'] ?? [];
$jumlah = $_POST['jumlah'] ?? [];

$harga = [
    "Buku" => 5000,
    "Pulpen" => 3000,
    "Pensil" => 2000
];

$subtotal = 0;
$detail = [];

if (count($barangDipilih) < 1) {
    $error = "Minimal pilih 1 barang!";
} else {

    foreach ($barangDipilih as $item) {
        $qty = $jumlah[$item] ?? 0;

        if ($qty < 1) {
            continue;
        }

        $totalItem = $harga[$item] * $qty;
        $subtotal += $totalItem;

        $detail[] = [
            "nama" => $item,
            "qty" => $qty,
            "total" => $totalItem
        ];
    }

    $pajak = $subtotal * PAJAK;

    if ($layanan == "Prioritas") {
        $biaya = 10000;
    } else {
        $biaya = 0;
    }

    $totalAkhir = $subtotal + $pajak + $biaya;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil</title>
</head>
<body>

<h2>Hasil Pemesanan</h2>

<p><b>Metode:</b> <?= $metode ?></p>

<?php if (isset($error)): ?>
    <p style="color:red"><?= $error ?></p>
<?php else: ?>

<table border="1" cellpadding="8">
    <tr><td>Nama</td><td><?= $nama ?></td></tr>
    <tr><td>NIM</td><td><?= $nim ?></td></tr>
    <tr><td>Email</td><td><?= $email ?></td></tr>
    <tr><td>Layanan</td><td><?= $layanan ?></td></tr>
</table>

<br>

<table border="1" cellpadding="8">
    <tr>
        <th>Barang</th>
        <th>Jumlah</th>
        <th>Total</th>
    </tr>

    <?php foreach ($detail as $d): ?>
    <tr>
        <td><?= $d['nama'] ?></td>
        <td><?= $d['qty'] ?></td>
        <td><?= $d['total'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br>

<table border="1" cellpadding="8">
    <tr><td>Subtotal</td><td><?= $subtotal ?></td></tr>
    <tr><td>Pajak</td><td><?= $pajak ?></td></tr>
    <tr><td>Biaya Layanan</td><td><?= $biaya ?></td></tr>
    <tr><td><b>Total</b></td><td><b><?= $totalAkhir ?></b></td></tr>
</table>

<?php endif; ?>

</body>
</html>