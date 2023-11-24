<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="assets/logo/5.png" type="image/x-icon">
    <title>DreamJourney - User</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .judul {
            color: #007CFF;
        }

        ::-webkit-scrollbar {
            width: 0.6rem;
            border-radius: 0.5rem;
            background-color: transparent;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 0.5rem;
            background-color: rgba(172, 173, 180, 0.5);
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: rgba(172, 173, 180, 0.7);
        }
    </style>
</head>

<body id="page-top">
    <?php
    include "koneksi.php";
    include "header.php";

    // Menghitung total destinasi
    $queryDestinasi = "SELECT COUNT(*) as total_destinasi FROM data_destinasi";
    $resultDestinasi = mysqli_query($koneksi, $queryDestinasi);

    if ($resultDestinasi) {
        $rowDestinasi = mysqli_fetch_assoc($resultDestinasi);
        $totalDestinasi = $rowDestinasi['total_destinasi'];
    } else {
        $totalDestinasi = 0;
    }

    // Menghitung total user
    $queryUser = "SELECT COUNT(*) as total_user FROM data_user";
    $resultUser = mysqli_query($koneksi, $queryUser);

    if ($resultUser) {
        $rowUser = mysqli_fetch_assoc($resultUser);
        $totalUser = $rowUser['total_user'];
    } else {
        $totalUser = 0;
    }

    // Menghitung total komentar
    $queryKomentar = "SELECT COUNT(*) as total_komentar FROM data_komentar";
    $resultKomentar = mysqli_query($koneksi, $queryKomentar);

    if ($resultKomentar) {
        $rowKomentar = mysqli_fetch_assoc($resultKomentar);
        $totalKomentar = $rowKomentar['total_komentar'];
    } else {
        $totalKomentar = 0;
    }

    // Menghitung total kategori
    $queryKategori = "SELECT COUNT(*) as total_kategori FROM data_kategori";
    $resultKategori = mysqli_query($koneksi, $queryKategori);

    if ($resultKategori) {
        $rowKategori = mysqli_fetch_assoc($resultKategori);
        $totalKategori = $rowKategori['total_kategori'];
    } else {
        $totalKategori = 0;
    }
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Destinasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $totalDestinasi; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-globe fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $totalUser; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Jumlah Komentar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $totalKomentar; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Jumlah Kategori</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $totalKategori; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-search fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mascot -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Mascot</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                    src="assets/img/mascot.svg" alt="...">
                            </div>
                            <p>RIMBO, si macan Jawa, menjadi simbol keceriaan dan semangat petualangan dalam
                                menjelajahi DreamJourney, menginspirasi pengguna untuk menjelajahi dunia dengan penuh
                                keceriaan.</p>
                        </div>
                    </div>

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Deskripsi</h6>
                        </div>
                        <div class="card-body">
                            <p>Dengan kekayaan alam yang luar biasa, keberagaman budaya yang menakjubkan, serta
                                petualangan yang menarik, DreamJourney menjadi jendela yang mempersembahkan informasi
                                lengkap mengenai destinasi wisata Indonesia. Dari pesona alam pantai yang memukau hingga
                                kekayaan sejarah dan warisan budaya yang memesona, situs ini memberikan panduan
                                komprehensif bagi para wisatawan untuk menjelajahi keindahan dan keunikan yang dimiliki
                                setiap tempat di Indonesia.</p>
                        </div>
                    </div>

                </div>
                <?php include "footer.php"; ?>
            </div>
</body>

</html>