<?php
include 'koneksi.php';

// Ambil data dari POST
$id_user = $_POST['id_user']; // ✅ Tambahkan ini
$id_makanan = $_POST['id_makanan'];
$jumlah = $_POST['jumlah'];
$total_harga = $_POST['total_harga'];

// Simpan pesanan ke database, termasuk id_user
$query = "INSERT INTO riwayat_pesanan (id_users, id_makanan, jumlah, total_harga) 
          VALUES ('$id_user', '$id_makanan', '$jumlah', '$total_harga')";

if (mysqli_query($conn, $query)) {
    echo json_encode(["success" => true, "message" => "Pesanan berhasil disimpan"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal menyimpan pesanan: " . mysqli_error($conn)]);
}
