<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include '../conn.php';
header("Content-Type: application/json");
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    mysqli_query($db, "INSERT INTO `detail_jadwal`(`id_jampel`, `id_kelas`, `id_user`, `status`, `mapel`, `ket`) VALUES ('$_POST[id_jampel]','$_POST[id_kelas]','$_POST[id_user]','$_POST[status]', '$_POST[mapel]', '$_POST[ket]')");
            
    $response = array();
    $response['message'] = "Berhasil menyimpan";
    $response['status'] = 1;
    echo json_encode($response);
}
