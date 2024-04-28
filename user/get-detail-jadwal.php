<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include '../conn.php';
require "../conn.php";
header("Content-Type: application/json");
$cek = "SELECT kelas.id_kelas, kelas.kelas, jampel.id_jampel, jampel.jam_ke, detail_jadwal.* FROM `detail_jadwal` JOIN kelas ON detail_jadwal.id_kelas = kelas.id_kelas JOIN jampel ON detail_jadwal.id_jampel = jampel.id_jampel WHERE detail_jadwal.id_jampel = '$_GET[id_jampel]'";
$query = mysqli_query($db, $cek);
$response = array();
while ($result = mysqli_fetch_assoc($query)) {
  $response[] = $result;
}
echo json_encode($response);