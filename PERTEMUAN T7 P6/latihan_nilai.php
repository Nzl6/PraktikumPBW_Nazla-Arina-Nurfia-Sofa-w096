<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>
        Input Nilai Mahasiswa
    </h2>

    <form method="post" action="">
        Nama : <input type="text" name="nama"><br>
        Nilai : <input type="number" name="nilai"><br>
        <input type="submit" value="proses">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $nilai = $_POST['nilai'];

        if ($nilai >= 85 && $nilai <= 100){
            $predikat = "A";
        }elseif ($nilai >=75){
            $predikat = "B";
        }elseif ($nilai >=65){
            $predikat = "C";
        }elseif ($nilai >=50){
            $predikat = "D";
        }elseif ($nilai >= 0){
            $predikat = "E";
        }else {
            $predikat = "Tidak Valid";
        }

        if ($nilai >= 75){
            $status = "LULUS";
        }else {
            $status = "TIDAK LULUS";
        }

        echo "<h3>Hasil</h3>";
        echo "Nama : $nama <br>";
        echo "Nilai : $nilai <br>";
        echo "Predikat : $predikat <br>";
        echo "Status : $status <br>";
        
        
    }
    ?>

</body>
</html>