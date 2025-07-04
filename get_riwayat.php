<?php
include 'koneksi.php';

// Ambil seluruh riwayat pesanan dan informasi nama makanan
$query = "SELECT menu_makanan.nama AS nama_makanan, 
                 rp.jumlah, rp.total_harga 
          FROM riwayat_pesanan rp 
          JOIN menu_makanan ON rp.id_makanan = menu_makanan.id
          ORDER BY rp.id DESC";

$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
