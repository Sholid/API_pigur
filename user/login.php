<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include '../conn.php';
header("Content-Type: application/json");
require "../conn.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = "SELECT * FROM user WHERE user='$username' and pass='$password'";
    $result = mysqli_fetch_array(mysqli_query($db, $cek));

    if (isset($result)) {
        $response['status'] = 1;
        $response['message'] = 'Login Berhasil';
        $response['data'] = $result;
        echo json_encode($response);
    } else {
        $response['status'] = 0;
        $response['message'] = "login gagal";
        echo json_encode($response);
    }
}
