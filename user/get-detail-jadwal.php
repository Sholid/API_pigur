<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include '../conn.php';
require "../conn.php";
header("Content-Type: application/json");
$cek = "SELECT * FROM `detail_jadwal` WHERE id_jampel = '$_GET[id_jampel]'";
$query = mysqli_query($db, $cek);
$response = array();
while ($result = mysqli_fetch_assoc($query)) {
  $response[] = $result;
}
echo json_encode($response);