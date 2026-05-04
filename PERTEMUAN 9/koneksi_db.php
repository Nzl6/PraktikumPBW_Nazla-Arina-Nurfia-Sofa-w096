<?php

$conn = new mysqli("localhost", "root", "", "pt10_pbw");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>