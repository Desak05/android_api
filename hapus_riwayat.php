<?php
include 'koneksi.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';

if (empty($id)) {
    echo json_encode(["success" => false, "message" => "ID tidak ditemukan"]);
    exit;
}

$query = "DELETE FROM riwayat_pesanan WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Data berhasil dihapus"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal menghapus data"]);
}
?>
