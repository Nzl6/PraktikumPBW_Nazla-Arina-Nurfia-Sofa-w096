<h3>Soal 1 - Jenis Kendaraan</h3>

<form method="POST">
    Masukkan jumlah roda:
    <input type="number" name="roda" required>
    <button type="submit">Cek</button>
</form>

<?php
if(isset($_POST['roda'])){
    $roda = $_POST['roda'];

    switch($roda){
        case 2:
            echo "Kendaraan: Motor";
            break;
        case 3:
            echo "Kendaraan: Bajaj";
            break;
        case 4:
            echo "Kendaraan: Mobil";
            break;
        default:
            echo "Tidak diketahui";
    }
}
?>