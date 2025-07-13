<?php
$host = "localhost";
$user = "root";
$pass = "";
$port = 3306;
$db = "uas_mobile";

$koneksi = new mysqli($host, $user, $pass, $db, $port);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
