<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include '../conn.php';
header("Content-Type: application/json");
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    mysqli_query($db, "INSERT INTO `kelas`(`kelas`) VALUES ('$_POST[kelas]')");
            
    $response = array();
    $response['message'] = "Berhasil menyimpan";
    $response['status'] = 1;
    echo json_encode($response);
}
