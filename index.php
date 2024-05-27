<?php 
    session_start();
    require "function/functions.php";
    
    if (isset($_SESSION["login"])) {
        header("Location: dashboard");
        exit;
    } elseif (isset($_COOKIE['login'])) {
        header("Location: dashboard");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/analysis.png">
    <title>CashFlow Manager</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
    <style>

.parallax-header {
background-image: url('img/bg-item.jpg'); /* Ganti dengan URL gambar latar belakang*/
background-size: cover;
background-position: center;
height: 100vh;
display: flex;
align-items: center;
justify-content: center;
text-align: center;
color: #fff;
}

.parallax-header .header-content {
    background-color: rgba(0, 0, 0, 0.5); /* Opacity untuk latar belakang */
    width: 100%;
    padding: 50px 0;
}

/* Efek parallax */
.parallax-header {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.feature-card {
    border: none;
    border-radius: 15px;
    transition: transform 0.2s ease-in-out;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact-icon {
    transition: transform 0.2s ease-in-out;
}

.contact-icon:hover {
    transform: scale(1.1);
}

    header {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100%;
    text-align: center;
}

.tip-card {
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid #fff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
    color: #333; /* Default text color for all tip cards */
}

.tip-card img {
    border-radius: 15px 15px 0 0;
}

.tip-card:hover {
    transform: translateY(-10px);
}

/* Specific text color for the "Menabung" card */
.tip-card.menabung-card .card-body {
    color: #333;
}

/* CSS untuk membuat tampilan navbar menjadi keren dan elegan */
.main-nav {
    background: linear-gradient(135deg, #306bff, #7c5ac2); /* Gradient background */
}

.main-nav .nav-link {
    font-weight: bold;
}

.main-nav .navbar-brand img {
    filter: brightness(0) invert(1); /* Mengubah warna ikon menjadi putih */
}

.main-nav .nav-link:hover {
    color: #f8f9fa; /* Warna teks saat dihover */
}

.main-nav .navbar-toggler-icon {
    border-color: #f8f9fa; /* Warna ikon toggler */
}

.main-nav .navbar-toggler {
    outline: none; /* Menghapus outline pada toggler */
}

.main-nav .navbar-toggler:hover {
    background-color: rgba(255, 255, 255, 0.1); /* Efek hover pada toggler */
}

    </style>
</head>

<body id="page-top">

    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top main-nav" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <img src="img/ubuntu.png" width="20px" style="margin-right: 10px; margin-bottom: 2px;"> CashFlow Manager
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a href="login" class="nav-link js-scroll-trigger">Sign in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <!-- End Navigation -->

    <!-- Header -->
<header id="home" class="parallax-header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 font-weight-bold text-white">Welcome To CashFlow</h1>
                    <p class="lead text-white">Aplikasi Pencatatan Keuangan Dengan Fitur Transaksi Terbaik</p>
                    <a href="login" class="btn btn-primary btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    </header>
    <!-- End Header -->

    <!-- Features -->
    <section id="features" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">FEATURES</h2>
            <div class="row mt-4">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card feature-card h-100">
                        <img src="img/pencatatan transaksi.jpeg" class="card-img-top" alt="Pencatatan Transaksi">
                        <div class="card-body">
                            <h4 class="card-title">Pencatatan Transaksi</h4>
                            <p class="card-text">Kami memberikan fitur yang memungkinkan software secara otomatis mencatat semua transaksi keuangan perusahaan, baik pemasukan maupun pengeluaran. Keunggulannya adalah mengurangi kesalahan dalam pencatatan, meningkatkan efisiensi dan menyediakan catatan transaksi akurat dan terorganisir.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card feature-card h-100">
                        <img src="img/laporan keuangan.jpeg" class="card-img-top" alt="Laporan Keuangan">
                        <div class="card-body">
                            <h4 class="card-title">Laporan Keuangan</h4>
                            <p class="card-text">Kami menyediakan fitur yang menghasilkan berbagai laporan keuangan penting, memberikan gambaran menyeluruh tentang kondisi keuangan dengan menganalisis laporan keuangan, mengidentifikasi area yang perlu ditingkatkan, dan membuat strategi keuangan yang lebih baik untuk mencapai tujuan mereka.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card feature-card h-100">
                        <img src="img/manajemen kas.jpeg" class="card-img-top" alt="Manajemen Kas">
                        <div class="card-body">
                            <h4 class="card-title">Manajemen Kas</h4>
                            <p class="card-text">Fitur ini mencangkup pengelolaan kas perusahaan, dan dapat menyediakan pelacakan transaksi kas secara rinci dan akurat. Keunggulannya adalah memudahkan pengawasan dan pengendalian terhadap kas perusahaan, mengoptimalkan penggunaan dana kas, dan mendukung audit keuangan dengan dokumentasi yang lengkap.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Features -->

    <!-- Manfaat CashFlow -->
    <section id="about" class="bg-primary text-white py-5">
    <div class="container">
        <h2 class="text-center mb-4">MANFAAT PENGGUNAAN CASHFLOW</h2>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card tip-card h-100 border-0">
                    <img src="img/pictures1.jpeg" class="card-img-top rounded-circle mx-auto" alt="Mencatat Keuangan">
                    <div class="card-body">
                        <p class="card-text text-center">Pengguna akan memiliki pemahaman aliran dana masuk dan keluar dalam bisnis, 
                            dan dapat melihat jelas bagaimana uang mengalir di dalam perusahaan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card tip-card h-100 border-0">
                    <img src="img/pictures3.jpeg" class="card-img-top rounded-circle mx-auto" alt="Prioritas Kebutuhan">
                    <div class="card-body">
                        <p class="card-text text-center">Pengguna dapat melacak transaksi secara teratur 
                            dan menganalisis pola pengeluaran. Hal ini mempermudah pengelolaan keuangan secara efisien. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card tip-card h-100 border-0">
                    <img src="img/pictures2.jpeg" class="card-img-top rounded-circle mx-auto" alt="Menabung">
                    <div class="card-body">
                        <p class="card-text text-center">Pengguna dapat merencanakan keuangan, menetapkan tujuan keuangan, 
                            dan mengidentifikasi pengeluaran yang dapat dihemat atau ditingkatkan. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card tip-card h-100 border-0">
                    <img src="img/pictures4.jpeg" class="card-img-top rounded-circle mx-auto" alt="Menabung">
                    <div class="card-body">
                        <p class="card-text text-center">Pengguna dapat membuat keputusan keuangan yang akurat dan terperinci, 
                            serta dapat membuat keputusan keuangan yang lebih baik dan lebih terinformasi. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- End Manfaat CashFlow -->

    <!-- Contact -->
    <!-- <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center">Contact</h2>
            <div class="row text-center mt-4">
                <div class="col">
                    <a href="https://www.facebook.com" target="_blank" class="contact-icon">
                        <i class="fa fa-facebook fa-3x text-primary"></i>
                    </a>
                </div>
                <div class="col">
                    <a href="https://www.instagram.com" target="_blank" class="contact-icon">
                        <i class="fa fa-instagram fa-3x text-danger"></i>
                    </a>
                </div>
                <div class="col">
                    <a href="https://wa.me/085846324951" target="_blank" class="contact-icon">
                        <i class="fa fa-whatsapp fa-3x text-success"></i>
                    </a>
                </div>
                <div class="col">
                    <a href="mailto:cashflowmanager@gmail.com" target="_blank" class="contact-icon">
                        <i class="fa fa-envelope fa-3x text-dark"></i>
                    </a>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End Contact -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>
</body>

</html>
