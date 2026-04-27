<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
    echo"selamat datang, ".$_SESSION['nama'];
}
?>