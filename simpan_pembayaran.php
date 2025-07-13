<?php
include 'koneksi.php';

$id_user = $_POST['id_user'];
$total = $_POST['total'];

$query = "INSERT INTO riwayat_pembayaran (id_user, total_harga) 
          VALUES ('$id_user', '$total')";

if (mysqli_query($koneksi, $query)) {
    echo json_encode(["success" => true, "message" => "Pembayaran disimpan"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal simpan: " . mysqli_error($koneksi)]);
}
