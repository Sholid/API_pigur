<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// include '../conn.php';
header("Content-Type: application/json");
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $targetDir = "uploads/";

    $targetFile = $targetDir . basename($_FILES["foto"]["name"]);

    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
            $imageUrl = "uploads/" . basename($_FILES["foto"]["name"]);
            $id_jampel = $_POST['id_jampel'];
            $id_kelas = $_POST['id_kelas'];
            $sql = "INSERT INTO `detail_jadwal`(`id_jampel`, `id_kelas`, `id_user`, `id_mapel`, `status`, `ket`, `foto`) 
                    VALUES ('$id_jampel','$id_kelas','$_POST[id_user]', '$_POST[id_mapel]', '$_POST[status]', '$_POST[ket]', '$imageUrl')";

            if ($db->query($sql) === TRUE) {
                $response = array();
                $response['message'] = "Berhasil menyimpan";
                $response['status'] = 1;
                echo json_encode($response);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "File bukan gambar.";
    }
}
