<h3>Nomor 2</h3>
<p>Mencetak bilangan genap dalam rentang tertentu</p>

<form method="POST">
    Dari: <input type="number" name="awal" required>
    Sampai: <input type="number" name="akhir" required>
    <button type="submit">Tampilkan</button>
</form>

<?php
if(isset($_POST['awal']) && isset($_POST['akhir'])){
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];

    echo "<b>Bilangan Genap:</b><br>";

    for($i = $awal; $i <= $akhir; $i++){
        if($i % 2 == 0){
            echo $i . "<br>";
        }
    }
}
?>