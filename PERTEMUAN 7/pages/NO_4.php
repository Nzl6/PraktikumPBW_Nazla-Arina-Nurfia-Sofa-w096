<h3>Nomor 4-Menentukan bilangan ganjil atau genap (ternary)</h3>

<form method="POST">
    Masukkan angka:
    <input type="number" name="angka" required>
    <button type="submit">Cek</button>
</form>

<?php
if(isset($_POST['angka'])){
    $angka = $_POST['angka'];

    $hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";

    echo "<b>Hasil:</b> Angka $angka adalah $hasil";
}
?>