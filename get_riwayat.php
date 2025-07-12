<?php
include 'koneksi.php';
header('Content-Type: application/json');

$id_user = $_POST['id_user']; // Ambil id_user dari POST (Android harus kirim ini)

// Query hanya untuk user tersebut
$query = "SELECT rp.id, rp.id_makanan, menu_makanan.nama AS nama_makanan, 
                 rp.jumlah, rp.total_harga 
          FROM riwayat_pesanan rp 
          JOIN menu_makanan ON rp.id_makanan = menu_makanan.id
          WHERE rp.id_users = '$id_user'
          ORDER BY rp.id DESC";

$result = mysqli_query($conn, $query);

$response = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = [
            'id' => (int) $row['id'],
            'id_makanan' => (int) $row['id_makanan'],
            'nama_makanan' => $row['nama_makanan'],
            'jumlah' => (int) $row['jumlah'],
            'total_harga' => (int) $row['total_harga']
        ];
    }

    echo json_encode($response);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Gagal mengambil data: ' . mysqli_error($conn)
    ]);
}
?>
