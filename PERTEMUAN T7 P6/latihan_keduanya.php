<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Input Data Mahasiswa</h2>
    <form method = "post">
        NPM: <input type="text" name="npm"><br><br>
        Nama: <input type="text" name="nama"><br><br>
        Prodi: <input type="text" name="prodi"><br><br>
        Semester: <input type="number" name="semester"><br><br>
        Biaya UKT: <input type="number" name="ukt"><br><br>
        <button type="submit" name="proses">Proses</button>
    </form>

    <hr>

    <?php
    if (isset($_POST['proses'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $semester = $_POST['semester'];
        $ukt = $_POST['ukt'];

        $diskon = 0;

        if ($ukt >= 5000000) {
            $diskon = 0.1;
            if ($semester > 8) {
                $diskon = 0.15;
            }
        }

        $j_diskon = $ukt * $diskon;
        $t_bayar = $ukt - $j_diskon;

        echo "<h3>Hasil</h3>";
        echo "NPM : $npm <br>";
        echo "Nama : $nama <br>";
        echo "Prodi : $prodi <br>";
        echo "Semester : $semester <br>";
        echo "Biaya UKT : Rp. " . number_format($ukt,0,',','.') . "<br>";
        echo "Diskon : " . ($diskon * 100) . "% <br>";
        echo "Yang Harus Dibayar : Rp. " . number_format($t_bayar,0,',','.');
    }
    ?>

</body>
</html>