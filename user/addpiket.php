<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include '../conn.php';

if (isset($_POST['hari']) && isset($_POST['id_user']) && isset($_POST['is_koord'])) {
    $hari = $_POST['hari'];
    $id_user = $_POST['id_user'];
    $is_koord = $_POST['is_koord'];

    $sql = "INSERT INTO piket (hari, id_user, is_koord) VALUES
    ('$hari', '$id_user','$is_koord')";

    mysqli_query($db, $sql);
} else {
    echo "error";
}
