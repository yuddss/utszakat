<?php
require("../dashboard.php");

// AMBIL QUERY DARI CONNECT.PHP
$data = query("SELECT * FROM donatur");

// Nama file yang akan di-generate
$fileName = 'donatur_database.csv';

// Path tempat menyimpan file
$filePath = '../dashboard/' . $fileName; // Ganti '../dashboard/' dengan path direktori tempat Anda ingin menyimpan file

// Membuka file untuk menulis
$file = fopen($filePath, 'w');

// Header kolom
$header = array('ID_donatur', 'Nama', 'Alamat', 'Jiwa', 'Harga', 'Total', 'Dibayarkan', 'Kembalian', 'Tanggal');

// Menulis header ke file
fputcsv($file, $header);

// Menulis data dari tabel ke file CSV
foreach ($data as $row) {
    fputcsv($file, $row);
}

// Menutup file
fclose($file);

// Menghasilkan URL untuk file yang di-download
$fileUrl = 'dashboard/' . $fileName; // Ganti 'dashboard/' dengan URL yang sesuai dengan lokasi file di server Anda

// Memberikan respon berupa JSON yang berisi URL file yang di-download
$response = array(
    'fileName' => $fileName,
    'fileUrl' => $fileUrl
);

// Memberikan respon JSON
echo json_encode($response);

exit();
?>
