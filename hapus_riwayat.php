<?php
include 'koneksi.php';

$id = $_POST['id'];

$query = "DELETE FROM riwayat_pesanan WHERE id = '$id'";

if (mysqli_query($conn, $query)) {
    echo json_encode(["success" => true, "message" => "Pesanan berhasil dihapus"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal menghapus pesanan"]);
}
?>
