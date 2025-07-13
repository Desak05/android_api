<?php
include 'koneksi.php';

$id_user = $_POST['id_user'];

$query = mysqli_query($koneksi, "DELETE FROM riwayat_pesanan WHERE id_user = '$id_user'");

if ($query) {
    echo json_encode(["status" => true, "message" => "Riwayat pesanan dihapus"]);
} else {
    echo json_encode(["status" => false, "message" => "Gagal menghapus riwayat"]);
}
?>
