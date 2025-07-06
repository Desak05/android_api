<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM menu_makanan");

$result = array();
while ($row = mysqli_fetch_assoc($query)) {
    $row['gambar'] = "http://10.0.2.2/android_api/images/" . $row['gambar'];
    $result[] = $row;
}

echo json_encode($result);
?>