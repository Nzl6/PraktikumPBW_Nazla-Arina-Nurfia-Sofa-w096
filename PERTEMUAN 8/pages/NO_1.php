<h3>Nomor 1</h3>
<p>Menentukan jenis kendaraan berdasarkan jumlah roda</p>

<form method="POST">
    Jumlah roda:
    <input type="number" name="roda" required>
    <button type="submit">Proses</button>
</form>

<?php
if(isset($_POST['roda'])){
    $roda = $_POST['roda'];

    switch($roda){
        case 2:
            echo "Roda $roda Klasifikasi Kendaraan: Motor";
            break;
        case 3:
            echo "Roda $roda Klasifikasi Kendaraan: Bajaj";
            break;
        case 4:
            echo "Roda $roda Klasifikasi Kendaraan: Mobil";
            break;
        default:
            echo "Roda $roda Klasifikasi Kendaraan: tidak diketahui";
    }
}  
?>