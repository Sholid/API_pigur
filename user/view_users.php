<?php
// Mengaktifkan laporan error dan strict mode untuk mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Mengambil koneksi database dari file conn.php
include '../conn.php';

// Melakukan query untuk mendapatkan semua data dari tabel tb_users
$result = $db->query("SELECT * FROM user where is_admin='0'");

// Menyiapkan array untuk menyimpan hasil
$response = array();

// Memeriksa apakah terdapat data yang ditemukan
if ($result->num_rows > 0) {
    // Mengambil data baris per baris dan memasukkannya ke dalam array response
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }

    // Mengirim response dalam format JSON
    echo json_encode($response);
} else {
    // Jika tidak ada data ditemukan, kirim pesan kosong dalam format JSON
    echo json_encode(array('message' => 'Tidak ada data yang ditemukan'));
}

// Menutup koneksi database
$db->close();
