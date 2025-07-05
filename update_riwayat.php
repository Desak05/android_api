<?php
include 'koneksi.php';

// Pastikan semua data dikirim
if (isset($_POST['id']) && isset($_POST['id_makanan']) && isset($_POST['jumlah']) && isset($_POST['total_harga'])) {
    $id = $_POST['id'];
    $id_makanan = $_POST['id_makanan'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];

    // Query update
    $query = "UPDATE riwayat_pesanan SET id_makanan = '$id_makanan', jumlah = '$jumlah', total_harga = '$total_harga' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode([
            "success" => true,
            "message" => "Pesanan berhasil diupdate"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Query gagal: " . mysqli_error($conn)
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Parameter tidak lengkap"
    ]);
}
