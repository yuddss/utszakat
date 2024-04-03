<?php
    require ("../dashboard/connect.php");

    // AMBIL QUERY DARI CONNECT.PHP
    $data = query ("SELECT * FROM donatur");

    // INSERT QUERY
    if (isset($_POST["submit"])) {    

        if(tambah($_POST) > 0 ) {
            
        echo "<script>function myAlert(){alert('Data berhasil ditambahkan');}</script>";

        // Delay the redirection using meta refresh
        echo "<meta http-equiv='refresh' content='0;url=dashboard.php'>";

        // You can also use JavaScript for redirection after a delay
        // echo "<script>setTimeout(function() { window.location.href = 'dashboard.php'; }, 1000);</script>";
        } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
}
?>


<!-- HTML -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Web Aplikasi Zakat| UCA</title>

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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Date Picker -->
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="dashboard.css">
    
</head>
<body>

    <div class="container">
        <aside>
            
            <h1>Dashboard</h1>

            <div class="nav">
                <a href="dashboard.php"><span class="material-symbols-outlined">
                    person_add
                    </span>Pembayaran Zakat</a>
            </div>

            <button class="logout" id="logoutBtn">Log Out</button>

                <script>
                // Function to handle logout
                function handleLogout() {
                // Ask for confirmation before logout
                var confirmLogout = confirm("Apakah anda yakin ingin logout?");
                if (confirmLogout) {
                // Lakukan permintaan logout ke logout.php
                fetch("logout.php")
                .then(response => {
                if (response.ok) {
                    // Berhasil logout
                    alert("Logged out successfully!");
                    // Redirect ke halaman utama
                    window.location.href = "../homepage/index.php";
                } else {
                    // Tampilkan pesan kesalahan jika terjadi masalah saat logout
                    alert("Failed to logout. Please try again.");
                }
                })
                .catch(error => {
                console.error("Error:", error);
                // Tampilkan pesan kesalahan jika terjadi masalah saat fetch
                alert("An error occurred. Please try again.");
                });
                }
                }

                // Attach event listener to logout button
                document.getElementById("logoutBtn").addEventListener("click", handleLogout);
                </script>
      
        </aside>
        <main>
            <div class="header">
                <h1>Pembayaran Zakat</h1>
                <button class="btnTambah">Buat Baru</button>
                <button class="btnDownload">Download</button>
            </div>

            <div class="table-container">

                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Transaksi</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jiwa</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Dibayarkan</th>
                            <th>Kembalian</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ( $data as $row ) : ?>
                        <tr>
                            <td  style="width: 5%"><?= $i ?></td>
                            <td style="width: 10%"><?= $row["ID_donatur"] ?></td>
                            <td style="width: 15%"><?= $row["Nama"] ?></td>
                            <td style="width: 20%"><?= $row["Alamat"] ?></td>
                            <td style="width: 10%"><?= $row["Jiwa"] ?></td>
                            <td style="width: 10%"><?= $row["Harga"] ?></td>
                            <td style="width: 10%"><?= $row["Total"] ?></td>
                            <td style="width: 10%"><?= $row["Dibayarkan"] ?></td>
                            <td style="width: 10%"><?= $row["Kembalian"] ?></td>
                            <td style="width: 10%"><?= $row["Tanggal"] ?></td>
                            <td style="width: 20%">
                                <a href="edit.php?id=<?=$row['ID_donatur']; ?>" class="btnEdit">Edit</a>
                                <a href="hapus.php?id=<?=$row['ID_donatur']; ?>" class="btnHapus"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data?\nData yang terhapus tidak akan bisa dikembalikan!');">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
            </div>
            
            <!-- FORM TAMBAH -->

            <div class="wrapperTambah">

                <div class="shape1"></div>
                <div class="shape2"></div>

                <form id="formTambah input" class="formTambah" action="tambah.php" method="POST">

                    <h1>Input Data Baru</h1>

                    <!-- <label class="form-input" for="ID_donatur">ID Donatur</label>
                    <input class="form-input" type="text" id="ID_donatur" name="ID_donatur" > -->

                    <label class="form-input" for="Nama">Nama</label>
                    <input class="form-input" placeholder="Nama Donatur"type="text" id="Nama" name="Nama" autocomplete="off" required>

                    <label class="form-input" for="Alamat">Alamat</label>
                    <input class="form-input" placeholder="Alamat" type="text" id="Alamat" name="Alamat" autocomplete="off" required>
                    
                    <label class="form-input" for="Jiwa">Jiwa</label>
                    <input class="form-input" placeholder="Jumlah Jiwa" type="text" id="Jiwa" name="Jiwa" autocomplete="off" required>

                    <label class="form-input" for="Harga">Harga</label>
                    <input class="form-input" placeholder="Harga Beras Per Liter" type="text" id="Harga" name="Harga" autocomplete="off" required>

                    <label class="form-input" for="Total">Total</label>
                    <input class="form-input" placeholder="Total Yang Harus Dibayar" type="text" id="Total" name="Total" autocomplete="off" required>
                   
                    <label class="form-input" for="Dibayarkan">Dibayarkan</label>
                    <input class="form-input" placeholder="Dibayarkan" type="text" id="Dibayarkan" name="Dibayarkan" autocomplete="off" required>
                   
                    <label class="form-input" for="Kembalian">kembalian</label>
                    <input class="form-input" placeholder="Kembalian" type="text" id="Kembalian" name="Kembalian" autocomplete="off" required>

                    <label class="form-input" for="Tanggal">Tanggal</label>
                    <input class="form-input" placeholder="Masukkan tanggal" type="text" id="Tanggal" name="Tanggal" autocomplete="off" require>
                    
                    <button type="submit" onclick="myAlert()" action="tambah.php" class="submit">Tambah</button>
                </form>
            </div>


            <!-- FORM EDIT -->


            <!-- <div class="wrapperEdit">

                <div class="shape2"></div>
                <div class="shape1"></div>

                <form action="edit.php" method="POST" class="myform">

                    <h1>Update Data Baru</h1>
                    
                    <!-- <label class="form-input" for="ID_donatur">ID Donatur</label>
                    <input class="form-input" type="text" id="ID_donatur" name="ID_donatur" > -->

                    <!-- <label class="form-input" for="Nama">Nama</label>
                    <input class="form-input" placeholder="Nama Donatur"type="text" id="Nama" name="Nama" required>

                    <label class="form-input" for="Alamat">Alamat</label>
                    <input class="form-input" placeholder="Alamat" type="text" id="Alamat" name="Alamat" required>
                    
                    <label class="form-input" for="Jiwa">Jiwa</label>
                    <input class="form-input" placeholder="Jumlah jiwa" type="text" id="Jiwa" name="Jiwa" required>

                    <label class="form-input" for="Harga">Harga</label>
                    <input class="form-input" placeholder="Harga beras perliter" type="text" id="Harga" name="Harga" required>

                    <label class="form-input" for="Total">Total</label>
                    <input class="form-input" placeholder="Total" type="text" id="Total" name="Total" required>

                    <label class="form-input" for="Dibayarkan">Dibayarkan</label>
                    <input class="form-input" placeholder="Dibayarkan" type="text" id="Dibayarkan" name="Dibayarkan" required>

                    <label class="form-input" for="Kembalian">Kembalian</label>
                    <input class="form-input" placeholder="Kembalian" type="text" id="Kembalian" name="Kembalian" required>
                                        
                    <label class="form-input" for="Tanggal">Tanggal</label>
                    <input class="form-input" placeholder="Masukkan tanggal" type="text" id="editTanggal" name="Tanggal" required>
                    
                    <button type="submit" action="edit.php" class="submit">Update</button>
                </form>
            </div> -->



        </main>

    </div>
    

    <script>
    $(document).ready(function() {
        // Inisialisasi date picker
        $("#Tanggal").datepicker({
            dateFormat: 'yy-mm-dd' // Format tanggal yang diinginkan (opsional)
        });
    });
    </script>

<script>
    $(document).ready(function() {
        // Event listener untuk tombol "Download"
        $(".btnDownload").on("click", function() {
            // Lakukan permintaan AJAX untuk mengambil data dari file PHP yang akan menghasilkan file database
            $.ajax({
                url: 'export.php', // Ganti 'export.php' dengan file PHP yang akan menghasilkan file database
                method: 'POST',
                success: function(response) {
                    // Buat link untuk men-download file database
                    var downloadLink = document.createElement('a');
                    downloadLink.href = response.fileUrl;
                    downloadLink.download = response.fileName;
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);
                },
                error: function(xhr, status, error) {
                    // Tampilkan pesan kesalahan jika terjadi masalah saat mengambil data dari server
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat mengambil data. Silakan coba lagi.');
                }
            });
        });
    });
</script>


    <script src="dashboard.js"></script>
</body>
</html>