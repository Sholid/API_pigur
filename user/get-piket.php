<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include '../conn.php';
require "../conn.php";
header("Content-Type: application/json");
$cek = "SELECT guru_piket.id_piket, guru_piket.is_koord, jadwal.id_jadwal, jadwal.tanggal FROM guru_piket JOIN jadwal ON guru_piket.id_jadwal = jadwal.id_jadwal WHERE guru_piket.id_user = '$_GET[id_user]'";
$query = mysqli_query($db, $cek);
$response = array();
while ($result = mysqli_fetch_assoc($query)) {
  $response[] = $result;
}
echo json_encode($response);