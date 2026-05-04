<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <h2>Tugas Pemrograman PHP</h2>
    <ul>
        <li><a href="?page=home">Beranda</a></li>
        <li><a href="?page=nomor1">Nomor 1</a></li>
        <li><a href="?page=nomor2">Nomor 2</a></li>
        <li><a href="?page=nomor3">Nomor 3</a></li>
        <li><a href="?page=nomor4">Nomor 4</a></li>
    </ul>
</div>

<div class="container">

<?php
switch($page){
    case 'nomor1':
        include "pages/NO_1.php";
        break;
    case 'nomor2':
        include "pages/NO_2.php";
        break;
    case 'nomor3':
        include "pages/NO_3.php";
        break;
    case 'nomor4':
        include "pages/NO_4.php";
        break;
    default:
        echo "<h3>Selamat Datang</h3>";
        echo "<p>Pilih nomor soal pada menu di atas</p>";
}
?>

</div>

</body>
</html>