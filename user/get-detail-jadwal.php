<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include '../conn.php';
require "../conn.php";
header("Content-Type: application/json");
if (isset($_GET['id_jampel'])) {
  $cek = "SELECT kelas.id_kelas, mapel.id_mapel, mapel.mapel, kelas.kelas, user.id_user, user.nama, jampel.id_jampel, jampel.jam_ke, detail_jadwal.* FROM `detail_jadwal` JOIN kelas ON detail_jadwal.id_kelas = kelas.id_kelas JOIN mapel ON detail_jadwal.id_mapel = mapel.id_mapel JOIN user ON detail_jadwal.id_user = user.id_user JOIN jampel ON detail_jadwal.id_jampel = jampel.id_jampel WHERE detail_jadwal.id_jampel = '$_GET[id_jampel]'";
}
else {
  $cek = "SELECT kelas.id_kelas, mapel.id_mapel, mapel.mapel, kelas.kelas, user.id_user, user.nama, jampel.id_jampel, jampel.jam_ke, detail_jadwal.* FROM `detail_jadwal` JOIN kelas ON detail_jadwal.id_kelas = kelas.id_kelas JOIN mapel ON detail_jadwal.id_mapel = mapel.id_mapel JOIN user ON detail_jadwal.id_user = user.id_user JOIN jampel ON detail_jadwal.id_jampel = jampel.id_jampel";
}
$query = mysqli_query($db, $cek);
$response = array();
while ($result = mysqli_fetch_assoc($query)) {
  $response[] = $result;
}
echo json_encode($response);