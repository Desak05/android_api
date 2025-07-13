<?php
include 'koneksi.php';

if (!isset($_POST['id_user'])) {
    echo json_encode([]);
    exit;
}

$id_user = $_POST['id_user'];

$query = mysqli_query($koneksi, "SELECT * FROM riwayat_pembayaran WHERE id_user = '$id_user'");
$result = array();

while ($row = mysqli_fetch_array($query)) {
    array_push($result, array(
        'id' => $row['id'],
        'id_user' => $row['id_user'],
        'total_harga' => $row['total_harga'],
        'tanggal' => $row['tanggal']
    ));
}

header('Content-Type: application/json');
echo json_encode($result);
?>
