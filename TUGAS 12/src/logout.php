<?php
session_start();

$_SESSION = [];
session_destroy();

header('Location: login.html?type=success&message=' . urlencode('Kamu berhasil logout.'));
exit;
?>
