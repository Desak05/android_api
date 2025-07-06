<?php
header('Content-Type: application/json');
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
        echo json_encode([
            "success" => true,
            "message" => "Login berhasil",
            "id" => $row['id']
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Password salah"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Username tidak ditemukan"]);
}