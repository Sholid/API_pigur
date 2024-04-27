<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include '../conn.php';

if (isset($_POST['nama']) && isset($_POST['jklm']) && isset($_POST['mapel']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['is_admin']) && isset($_POST['telepon'])) {
    $nama = $_POST['nama'];
    $nip = isset($_POST['nip']) ? $_POST['nip'] : '-';
    $jklm = $_POST['jklm'];
    $mapel = $_POST['mapel'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $is_admin = $_POST['is_admin'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO user (nama, nip, jklm, mapel, user, pass, is_admin, telepon) VALUES
    ('$nama', '$nip','$jklm','$mapel','$user','$pass','$is_admin','$telepon')";

    mysqli_query($db, $sql);
} else {
    echo "error";
}
