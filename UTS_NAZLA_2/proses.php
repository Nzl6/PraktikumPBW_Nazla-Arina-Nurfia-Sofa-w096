<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nama = $_POST['nama'] ?? 'Nama tidak diberikan';
    $npm = $_POST['npm'] ?? 'NPM tidak diberikan';
    $email = $_POST['email'] ?? 'Email tidak diberikan';
    $jenis_layanan = $_POST['jenis_layanan'] ?? 'Jenis layanan tidak dipilih';
    $barang = $_POST['barang'] ?? [];
    $pesan = $_POST['pesan'] ?? 'Pesan tidak diberikan';

    echo "<h2>Data Pembelian Barang Koprasi</h2>";
    echo "<table border='1'>
            <tr>
                <th>Nama Lengkap</th>
                <th>NPM</th>
                <th>Email</th>
                <th>Jenis Layanan</th>
                <th>Barang yang Dipilih</th>
                <th>Pesan Permintaan</th>
            </tr>
            <tr>
                <td>$nama</td>
                <td>$npm</td>
                <td>$email</td>
                <td>$jenis_layanan</td>
                <td>" . (empty($barang) ? 'Tidak ada barang yang dipilih' : implode(', ', $barang)) . "</td>
                <td>$pesan</td>
            </tr>
          </table>";
} else {
    echo "Formulir belum diisi.";
}

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