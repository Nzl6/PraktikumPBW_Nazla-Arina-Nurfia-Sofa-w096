<?php

    $barang = [
        "Dry Food" => 38000,
        "Pasir 5L" => 28000,
        "Wet Food" => 6000,
        "Shampo" => 15000,
        "Kandang" => 500000,
        "Maenan" => 20000
    ];

    $nama_barang = "Dry Food";
    $jumlah = 2;
    $pajak = 0.1;

    $nama_barang = "Pasir 5L";
    $jumlah = 4;
    $pajak = 0.1;

    $harga = $barang[$nama_barang];
    $total = $harga * $jumlah;
    $t_pajak = $total * $pajak;
    $t_bayar = $total + $t_pajak;
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS PHP</title>
</head>
<style>
    .box {
        width: 420px;
        border: 20x solid black;
        padding: 20px;
        font-family: Arial;
    }
    .judul {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .total {
        font-weight: bold;
    }
</style>
<body>
    <div class="box">
        <div class="judul">Perhitungan Total Pembelian</div>
        <hr>

        <p>Nama Barang: <?php echo $nama_barang; ?></p>
        <p>Harga Satuan: Rp <?php echo $harga; ?></p>
        <p>Jumlah Beli: <?php echo $jumlah; ?></p>
        <p>Total Harga: Rp <?php echo $total; ?></p>
        <p>Pajak (10%): Rp <?php echo $t_pajak; ?></p>
        <p class="total">Total Bayar: Rp <?php echo $t_bayar; ?></p>
        
    </div>
</body>
</html>