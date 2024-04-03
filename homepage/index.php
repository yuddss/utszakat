<?php
// Mulai sesi
session_start();

// Hubungkan ke database
require ("connect.php");

// Periksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form login
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Cek username dan password di database
    $query = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {

        // Login berhasil, buat session
        $_SESSION['username'] = $username;

        // Redirect ke halaman utama
        header("Location:../dashboard/dashboard.php");

        exit(); // Pastikan untuk keluar dari script setelah melakukan redirect
        
    } else {
        // Redirect ke halaman utama
        header("Location: gagal-login.html");
    }
}

// Tutup koneksi database
mysqli_close($conn);
?>




<!-- HTML -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page Zakat | UCA</title>

    <!-- Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Licorice&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Licorice&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="homepage.css">
    
    
</head>
<body>

    <header id="header" class="header">

        <a href="#" class="logo">
            <img src="../img/logo.png" alt="">
            <h1>Universitas<br>Cendekia Abditama</h1>
        </a>

        <nav class="navbar">
            <a href="#home" class="nav">Home</a>
            <a href="#about" class="nav">About</a>
            <button href="#form-login" class="btn">LOGIN</button>
        </nav>
    </header>

    
    <video autoplay muted loop id="bg-video">
        <source src="../img/video.mp4" type="video/mp4">
    </video>  
       

    <div class="wrapper">

        <div class="form-box">

            <form class="form-login" action="" method="POST"> <!-- tambahkan method="POST" untuk mengirim data form -->
                <h3>Login Here</h3>
            
                <label for="username">Username</label>
                <input type="text" placeholder="ID or Username" id="username" name="username" autocomplete=off required> <!-- tambahkan name="username" -->
            
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" name="password" required> <!-- tambahkan name="password" -->
            
                <button type="submit">Masuk</button>
            </form>

        </div>
    </div>
    
  
    <div id="about" class="about">
        
        <div class="about-content">
            <div class="isi">
                <h1>ZAKAT</h1>
                <h2>Anggota kelompok</h2>

                <p>2222105018 - Oracle Kanzul Ilmi<br>2222105226 - Yusri Husyen<br>2222105224 - Yudo Putra Hutagalung<br>2222105223 - Yudha Wastu Pratama<br>2222105219 - William O'brien Paloren Setiawan<br>2222105243 - Mega Rani</p>
            
                <!-- <a href="#" class="btn">Bayar Zakat</a> -->
            </div>
        </div>
    </div>

<script src="homepage.js"></script>
</body>
</html>