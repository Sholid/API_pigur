<?php
header("Content-Type: application/json");
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    foreach(explode(";",$_POST['tanggal']) as $tangggal) {
        $sql = "INSERT INTO `jadwal`(`tanggal`) VALUES ('$tangggal')";
        $query = mysqli_query($db, $sql);
        if ($query) {
            $id_jadwal = mysqli_insert_id($db);
            foreach($_POST['guru'] as $guru) {
                mysqli_query($db, "INSERT INTO `guru_piket`(`id_jadwal`, `id_user`, `is_koord`) VALUES ('$id_jadwal', '$guru[user_id]', '$guru[is_koord]')");
            }
        }
    }
    $response = array();
    $response['message'] = "Berhasil menyimpan";
    $response['status'] = 1;
    echo json_encode($response);
}
