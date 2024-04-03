<?php
// Hubungkan ke database
require ("../dashboard/connect.php");

// Ambil data yang dikirimkan dari formulir tambah data
$nama = htmlspecialchars($_POST['Nama']);
$alamat = htmlspecialchars($_POST['Alamat']);
$jiwa = htmlspecialchars($_POST['Jiwa']);
$harga = htmlspecialchars($_POST['Harga']);
$total = htmlspecialchars($_POST['Total']);
$dibayarkan = htmlspecialchars($_POST['Dibayarkan']);
$kembalian = htmlspecialchars($_POST['Kembalian']);
$tanggal = htmlspecialchars($_POST['Tanggal']);

// Buat dan jalankan query untuk menambahkan data ke dalam database
$query = "INSERT INTO donatur (Nama, Alamat, Jiwa, Harga, Total, Dibayarkan, Kembalian, Tanggal) VALUES ('$nama', '$alamat', '$jiwa', '$harga', '$total', '$dibayarkan', '$kembalian', '$tanggal')";
if (mysqli_query($conn, $query)) {
    
    // Output JavaScript alert
    echo "<script>function myAlert(){alert('Data berhasil ditambahkan');}</script>";

    // Delay the redirection using meta refresh
    echo "<meta http-equiv='refresh' content='0;url=dashboard.php'>";

    // You can also use JavaScript for redirection after a delay
    // echo "<script>setTimeout(function() { window.location.href = 'dashboard.php'; }, 1000);</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}



// Tutup koneksi database
mysqli_close($conn);
?>
