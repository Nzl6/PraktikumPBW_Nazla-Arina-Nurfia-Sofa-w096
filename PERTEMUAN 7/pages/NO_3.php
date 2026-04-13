<h3>Nomor 3-Menampilkan daftar nama hewan menggunakan array</h3>

<form method="POST">
    Input hewan:<br>
    <input type="text" name="hewan" required>
    <button type="submit">Tampilkan</button>
</form>

<?php
if(isset($_POST['hewan'])){
    $hewan = explode(",", $_POST['hewan']);

    echo "<b>Daftar Hewan:</b><br>";

    foreach($hewan as $h){
        echo trim($h) . "<br>";
    }
}
?>