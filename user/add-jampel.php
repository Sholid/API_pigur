<?php
echo $_SERVER['REQUEST_METHOD'];
header("Content-Type: application/json");
require "../conn.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    mysqli_query($db, "INSERT INTO `jampel`(`id_jadwal`, `jam_ke`) VALUES ('$_POST[id_jadwal]', '$_POST[jam_ke]')");
            
    $response = array();
    $response['message'] = "Berhasil menyimpan";
    $response['status'] = 1;
    echo json_encode($response);
}