<?php
session_start();

if (isset($_SESSION['email'])) {
    $headerText = '<img src="../landing/assets/images/user_icon.svg" alt="Logout" height="30">';
    $headerLink = "../login/logout.php";
} else {
    $headerText = "Masuk";

    $headerLink = "../login/login.php";
    $registerText = "Daftar";
    $registerLink = "../login/register.php";
}

include 'koneksi.php';

if (isset($_GET['kode_destinasi'])) {
    $kode_destinasi = $_GET['kode_destinasi'];

    $stmt_destinasi = $conn->prepare("SELECT * FROM data_destinasi WHERE kode_destinasi = ?");
    $stmt_destinasi->bind_param("i", $kode_destinasi);
    $stmt_destinasi->execute();
    $result_destinasi = $stmt_destinasi->get_result();

    if ($result_destinasi->num_rows > 0) {
        $row_destinasi = $result_destinasi->fetch_assoc();

        $stmt_kategori = $conn->prepare("SELECT kategori FROM data_kategori WHERE kode_kategori = ?");
        $stmt_kategori->bind_param("i", $row_destinasi['kode_kategori']);
        $stmt_kategori->execute();
        $result_kategori = $stmt_kategori->get_result();
        $k = $result_kategori->fetch_assoc();
        $kategori = $k['kategori'];

        // Prepared statement untuk query data_destinasi sesuai dengan kategori
        $stmt_data_kategori = $conn->prepare("SELECT * FROM data_destinasi WHERE kode_kategori = ?");
        $stmt_data_kategori->bind_param("i", $row_destinasi['kode_kategori']);
        $stmt_data_kategori->execute();
        $result_data_kategori = $stmt_data_kategori->get_result();

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <!--=============== BOXICONS ===============-->
            <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

            <!--=============== SWIPER CSS ===============-->
            <link rel="stylesheet" href="./assets/libraries/swiper-bundle.min.css" />

            <!--=============== CSS ===============-->
            <link rel="stylesheet" href="./assets/css/style.css" />

            <link rel="icon" href="assets/img/6.png">

            <title>DreamJourney</title>

            <style>
                .kuliner-section ul li::before {
                    content: "\2022";
                    color: #fff;
                    display: inline-block;
                    width: 1em;
                    margin-left: -1em;
                }

                .map-container {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: 0 auto;
                    text-align: center;
                }

                .map-container iframe {
                    max-width: 100%;
                    height: 450px;
                    border-radius: 10px;
                    overflow: hidden;
                }

                .blog {
                    margin-top: 80px;
                }

                #header {
                    z-index: 997;
                    transition: all 0.5s;
                    background: #007cff;
                    padding: 22px 0;
                }

                #header.header-transparent {
                    background: none;
                }

                #header.header-transparent a {
                    color: #fff;
                    /* Mengubah warna teks menjadi putih */
                    text-transform: uppercase;
                    /* Mengubah teks menjadi huruf kapital */
                    font-weight: bold;
                    /* Membuat teks menjadi tebal */
                }

                #header.header-scrolled {
                    background: #007cff;
                    padding: 12px 0;
                }

                #header .logo h1 {
                    font-size: 36px;
                    margin: 0;
                    padding: 0;
                    line-height: 1;
                    font-weight: 400;
                    letter-spacing: 3px;
                    text-transform: uppercase;
                }

                #header .logo h1 a,
                #header .logo h1 a:hover {
                    color: #fff;
                    text-decoration: none;
                }

                #header .logo img {
                    padding: 0;
                    margin: 0;
                    max-height: 40px;
                }
            </style>
        </head>

        <body>
            <!--==================== HEADER ====================-->
            <header id="header" class="fixed-top d-flex align-items-center header-transparent">
                <div class="container d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <a href="../index.php"><img src="assets/img/2.png" alt="" class="img-fluid"></a>
                    </div>
                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto" style="color: #fff; text-transform: uppercase; font-weight: bold;"
                                    href="<?php echo $headerLink; ?>">
                                    <?php echo $headerText; ?>
                                </a></li>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav>
                </div>
            </header>

            <!--==================== MAIN ====================-->
            <main class="main">
                <!--==================== HOME ====================-->
                <section>
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <section class="islands swiper-slide">
                                <img src="../upload/<?php echo $row_destinasi['gambar']; ?>" alt="" class="islands__bg" />
                                <div class="islands__container container">
                                    <div class="islands__data">
                                        <h1 class="islands__title">
                                            <?php echo $row_destinasi['nama_destinasi']; ?>
                                        </h1>
                                        <h2 class="islands__subtitle">
                                            <?php echo $kategori; ?>
                                        </h2>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>

                <!-- blog -->
                <section class="blog section" id="blog">
                    <div class="blog__container container">
                        <div class="content__container">
                            <div class="blog__detail">
                                <p>
                                    <?php echo $row_destinasi['informasi']; ?>
                                </p>
                            </div>
                            <div class="package-travel">
                                <h3>Harga Tiket Masuk</h3>
                                <ul>
                                    <li>
                                        <?php
                                        if ($row_destinasi['harga'] !== "GRATIS") {
                                            echo 'Rp. ' . number_format($row_destinasi['harga'], 0, ',', '.');
                                        } else {
                                            echo $row_destinasi['harga'];
                                        }
                                        ?>
                                    </li>
                                </ul>
                                <h3 class="kuliner-title">Kuliner</h3>
                                <div class="kuliner-section">
                                    <ul>
                                        <?php
                                        $kuliner = $row_destinasi['kuliner'];
                                        $kulinerArray = explode(',', $kuliner);

                                        foreach ($kulinerArray as $item) {
                                            echo "<li>$item</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Map Section -->
                <section class="map-section">
                    <div class="map-container" id="map-container">
                        <iframe src="<?php echo $row_destinasi['map']; ?>" width="90%" height="450" style="border:0;"
                            allowfullscreen="" loading="" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </section>

                <?php include 'komentar.php'; ?>

                <!--==================== FOOTER ====================-->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>&copy; 2022-2023 DreamJourney. All Rights Reserved.</span>
                        </div>
                    </div>
                </footer>

                <!--========== SCROLL UP ==========-->
                <a href="#" class="scrollup" id="scroll-up">
                    <i class="bx bx-chevrons-up"></i>
                </a>

                <!--=============== SCROLLREVEAL ===============-->
                <script src="./assets/libraries/scrollreveal.min.js"></script>

                <!--=============== SWIPER JS ===============-->
                <script src="./assets/libraries/swiper-bundle.min.js"></script>

                <!--=============== MAIN JS ===============-->
                <script src="./assets/js/main.js"></script>
        </body>

        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>
        <script src="../assets/js/main.js"></script>

        </html>
        <?php
    } else {
        // Handle jika data tidak ditemukan
        echo "Data not found";
    }
} else {
    // Handle jika parameter tidak tersedia
    echo "Parameter not provided";
}

?>