<?php
include 'koneksi.php';
header('Content-Type: application/json');

// Cek apakah parameter id_user dikirim
if (!isset($_POST['id_user'])) {
    echo json_encode([
        "success" => false,
        "message" => "Parameter id_user tidak dikirim"
    ]);
    exit;
}

$id_user = $_POST['id_user'];

// Eksekusi query
$query = mysqli_query($koneksi, "DELETE FROM riwayat_pesanan WHERE id_users = '$id_user'");

if ($query) {
    echo json_encode([
        "success" => true,
        "message" => "Riwayat pesanan dihapus"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Gagal menghapus riwayat"
    ]);
}
?>