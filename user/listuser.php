<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include '../conn.php';
require "../conn.php";
header("Content-Type: application/json");
$cek = "SELECT * FROM user";
$result = mysqli_fetch_array(mysqli_query($db, $cek));
$response = array();
$response['data'] = $result;
echo json_encode($response);
