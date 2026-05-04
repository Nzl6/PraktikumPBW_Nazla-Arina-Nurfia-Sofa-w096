<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $email = $_POST['email'];
    $layanan = $_POST['jenis_layanan'] ?? 'Tidak dipilih';
    $barang = $_POST['barang'] ?? [];
    $jumlah = $_POST['jumlah'] ?? [];
    $pesan = $_POST['pesan'];

    $harga = [
        "Buku" => 5000,
        "Pulpen" => 3000,
        "Pensil" => 2000,
        "Penghapus" => 1000
    ];

    $detail = [];
    $subtotal = 0;

    foreach ($barang as $b) {
        $qty = $jumlah[$b] ?? 0;
        $total = $qty * $harga[$b];

        $detail[] = [
            "nama" => $b,
            "qty" => $qty,
            "total" => $total
        ];

        $subtotal += $total;
    }

    // Pajak 10%
    $pajak = $subtotal * 0.1;

    // Biaya layanan
    $biaya = ($layanan == "Prioritas") ? 5000 : 2000;

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

<table border="1" cellpadding="8">
    <tr><td>Nama</td><td><?= $nama ?></td></tr>
    <tr><td>NPM</td><td><?= $npm ?></td></tr>
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
    <tr><td>Pajak (10%)</td><td><?= $pajak ?></td></tr>
    <tr><td>Biaya Layanan</td><td><?= $biaya ?></td></tr>
    <tr><td><b>Total</b></td><td><b><?= $totalAkhir ?></b></td></tr>
</table>

<br>
<p><b>Pesan:</b> <?= $pesan ?></p>

</body>
</html>