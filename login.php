<?php
session_start(); // WAJIB di awal untuk bisa pakai $_SESSION
include 'koneksi.php';

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($username) || empty($password)) {
    echo json_encode(["success" => false, "message" => "Field tidak lengkap"]);
    exit;
}

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if ($password == $row['password']) {

        $_SESSION['user_id'] = $row['id_user'];
        $_SESSION['nama_user'] = $row['nama']; // opsional

        echo json_encode(["success" => true, "message" => "Login berhasil"]);
    } else {
        echo json_encode(["success" => false, "message" => "Password salah"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Username tidak ditemukan"]);
}
?>
