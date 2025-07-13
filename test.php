<?php
include 'koneksi.php';

$user_id = $_POST['user_id']; 

// Ambil riwayat berdasarkan user
$query = "SELECT u.nama AS nama_user, menu_makanan.nama AS nama_makanan, 
                 rp.jumlah, rp.total_harga 
          FROM riwayat_pesanan rp 
          JOIN users u ON rp.user_id = u.id_user
          JOIN menu_makanan ON rp.id_makanan = menu_makanan.id
          WHERE rp.user_id = '$user_id'
          ORDER BY rp.id_pesanan DESC";

$result = mysqli_query($koneksi, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
