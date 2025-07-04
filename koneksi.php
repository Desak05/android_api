<?php
$host = "localhost";
$user = "root";
$pass = "";
$port = 3306;
$db = "uas_mobile";

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
