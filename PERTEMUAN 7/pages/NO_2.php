<h3>Soal 2 - Bilangan Genap</h3>

<form method="POST">
    Dari: <input type="number" name="awal" required>
    Sampai: <input type="number" name="akhir" required>
    <button type="submit">Tampilkan</button>
</form>

<?php
if(isset($_POST['awal']) && isset($_POST['akhir'])){
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];

    for($i = $awal; $i <= $akhir; $i++){
        if($i % 2 == 0){
            echo $i . "<br>";
        }
    }
}
?>