<?php
session_start();
include '../config/koneksi.php';
$userid = $_SESSION['id'];
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum Login!');
    location.href='../index.php';
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" conctent="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/sidebars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>
        body {
            background-color: whitesmoke;
        }
    </style>  
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav me-auto">
        <a href="home.php" class="nav-link">Home</a>
            <a href="album.php" class="nav-link">Album</a>
            <a href="foto.php" class="nav-link">Foto</a>
            <a href="../index.php" class="nav-link">Beranda Umum</a>
            <a href="notifikasi.php" class="nav-link">Notifikasi</a>
        </div>

        <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
    </div>
</div>
</nav>

<div class="container" style="width:100%; display:flex; align-items:center; justify-content:center;">
<div class="notification d-flex p-2">
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white ml-auto" style="width: 380px;">
<div class="list-group list-group-flush border-bottom scrollarea">

<?php
 $notifikasi = mysqli_query($koneksi, "SELECT * FROM like_foto JOIN user ON user.id = like_foto.user_id JOIN foto on foto.id = like_foto.foto_id where foto.user_id = '$userid' AND NOT like_foto.user_id = '$userid'"); 
 while($data_notif = mysqli_fetch_array($notifikasi)){?>
 <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">

 <div class="d-flex w-100 align-items-center justifi-content-between">
    <strong class="mnb1"><?php echo $data_notif['username']?></strong>
    <small class="text-muted"><?php echo $data_notif['tanggal_like']?></small>
 </div>
 <div class="col-10 mb-1 small">Menyukai Foto Anda</div>
 </a>
 <?php }?>
</div>
</div>
</div>
</div>
</body>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
                <p>&copy; UKK RPL 2024 | Nurul Muhammad Agit</p>
            </footer>
            <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        </body>
        </html>
    