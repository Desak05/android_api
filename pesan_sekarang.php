<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "User belum login"]);
    exit;
}

$user_id = $_SESSION['user_id']; // Ambil ID user dari session
$id_makanan = $_POST['id_makanan'];
$jumlah = $_POST['jumlah'];
$total_harga = $_POST['total_harga'];

// Simpan pesanan
$query = "INSERT INTO riwayat_pesanan (user_id, id_makanan, jumlah, total_harga) 
          VALUES ('$user_id', '$id_makanan', '$jumlah', '$total_harga')";

if (mysqli_query($conn, $query)) {
    echo json_encode(["success" => true, "message" => "Pesanan berhasil disimpan"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal menyimpan pesanan: " . mysqli_error($conn)]);
}
?>
