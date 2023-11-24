<?php
include 'koneksi.php';

if (isset($_GET['kode_destinasi'])) {
    $kode_destinasi = $_GET['kode_destinasi'];

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM data_destinasi WHERE kode_destinasi = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kode_destinasi);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />

                <!--=============== BOXICONS ===============-->
                <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

                <!--=============== SWIPER CSS ===============-->
                <link rel="stylesheet" href="./assets_detail/libraries/swiper-bundle.min.css" />

                <!--=============== CSS ===============-->
                <link rel="stylesheet" href="./assets_detail/css/style.css" />

                <title>Blog - ypcode</title>

                <style>
                    .kuliner-section ul li::before {
                        content: "\2022";
                        color: #your-font-color;
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
                </style>
            </head>

            <body>
                <!--==================== HEADER ====================-->
                <header class="header" id="header">
                    <nav class="nav container">
                        <a href="#home" class="nav__logo">G<i class="bx bxs-map"></i> TRAVEL</a>

                        <div class="nav__menu">
                            <ul class="nav__list">
                                <li class="nav__item">
                                    <a href="index.html" class="nav__link">
                                        <i class="bx bx-home-alt"></i>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="package-travel.html" class="nav__link">
                                        <i class="bx bx-building-house"></i>
                                        <span>Package Travel</span>
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="blog.html" class="nav__link active-link">
                                        <i class="bx bx-award"></i>
                                        <span>Blog</span>
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="contact.html" class="nav__link">
                                        <i class="bx bx-phone"></i>
                                        <span>Contact</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- theme -->
                        <i class="bx bx-moon change-theme" id="theme-button"></i>

                        <a href="#button" class="button nav__button">Booking Now</a>
                    </nav>
                </header>

                <!--==================== MAIN ====================-->
                <main class="main">
                    <!--==================== HOME ====================-->
                    <section>
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                ?>
                                <section class="islands swiper-slide">
                                    <img src="../upload/<?php echo $row['gambar']; ?>" alt="" class="islands__bg" />
                                    <div class="islands__container container">
                                        <div class="islands__data">
                                            <h1 class="islands__title">
                                                <?php echo $row['nama_destinasi']; ?>
                                            </h1>
                                            <h2 class="islands__subtitle">
                                                <?php echo $k['kategori']; ?>
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
                                        <?php echo $row['informasi']; ?>
                                    </p>
                                </div>
                                <div class="package-travel">
                                    <h3>Harga Tiket Masuk</h3>
                                    <ul>
                                        <li>
                                            <?php
                                            if ($row['harga'] !== "GRATIS") {
                                                echo 'Rp. ' . number_format($row['harga'], 0, ',', '.');
                                            } else {
                                                echo $row['harga'];
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                    <h3 class="kuliner-title">Kuliner</h3>
                                    <div class="kuliner-section">
                                        <ul>
                                            <?php
                                            $kuliner = $row['kuliner'];
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
                            <iframe src="<?php echo $row['map']; ?>" width="90%" height="450" style="border:0;" allowfullscreen=""
                                loading="" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </section>

                    <section class="blog" id="blog">
                        <div class="blog__container container">
                            <h2 class="section__title" style="text-align: center">
                                Informasi Selengkapnya
                            </h2>

                            <div class="blog__content grid">
                                <article class="blog__card">
                                    <div class="blog__image">
                                        <img src="./assets/img/blog-1.jpg" alt="" class="blog__img" />
                                        <a href="#" class="blog__button">
                                            <i class="bx bx-right-arrow-alt"></i>
                                        </a>
                                    </div>

                                    <div class="blog__data">
                                        <h2 class="blog__title">10 Coffee Recommendations</h2>
                                        <p class="blog__description">
                                            The blogs about coffee will help you a lot about how it is
                                            prepared, its waiting time, for a good quality coffee.
                                        </p>

                                        <div class="blog__footer">
                                            <div class="blog__reaction">2 Juli 2029</div>
                                            <div class="blog__reaction">
                                                <i class="bx bx-show"></i>
                                                <span>76,5k</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="blog__card">
                                    <div class="blog__image">
                                        <img src="./assets/img/blog-2.jpg" alt="" class="blog__img" />
                                        <a href="#" class="blog__button">
                                            <i class="bx bx-right-arrow-alt"></i>
                                        </a>
                                    </div>

                                    <div class="blog__data">
                                        <h2 class="blog__title">12 Benefits Of Drinking Coffee</h2>
                                        <p class="blog__description">
                                            The blogs about coffee will help you a lot about how it is
                                            prepared, its waiting time, for a good quality coffee.
                                        </p>

                                        <div class="blog__footer">
                                            <div class="blog__reaction">12 Juni 2023</div>
                                            <div class="blog__reaction">
                                                <i class="bx bx-show"></i>
                                                <span>356,7</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="blog__card">
                                    <div class="blog__image">
                                        <img src="./assets/img/blog-3.jpg" alt="" class="blog__img" />
                                        <a href="#" class="blog__button">
                                            <i class="bx bx-right-arrow-alt"></i>
                                        </a>
                                    </div>

                                    <div class="blog__data">
                                        <h2 class="blog__title">12 Benefits Of Drinking Coffee</h2>
                                        <p class="blog__description">
                                            The blogs about coffee will help you a lot about how it is
                                            prepared, its waiting time, for a good quality coffee.
                                        </p>

                                        <div class="blog__footer">
                                            <div class="blog__reaction">20 Juli 2024</div>
                                            <div class="blog__reaction">
                                                <i class="bx bx-show"></i>
                                                <span>356,7</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </section>
                </main>
                <?php
        }
        ?>

            <!--==================== FOOTER ====================-->
            <footer class="footer section">
                <div class="footer__container container grid">
                    <div>
                        <a href="#" class="footer__logo">
                            G<i class="bx bxs-map"></i> TRAVEL
                        </a>
                        <p class="footer__description">
                            Our vision is to help people find the <br />
                            best places to travel with high security
                        </p>
                    </div>

                    <div class="footer__content">
                        <div>
                            <h3 class="footer__title">About</h3>

                            <ul class="footer__links">
                                <li>
                                    <a href="#" class="footer__link">About Us</a>
                                </li>
                                <li>
                                    <a href="#" class="footer__link">Features </a>
                                </li>
                                <li>
                                    <a href="#" class="footer__link">News & Blog</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="footer__title">Company</h3>

                            <ul class="footer__links">
                                <li>
                                    <a href="#" class="footer__link">How We Work? </a>
                                </li>
                                <li>
                                    <a href="#" class="footer__link">Capital </a>
                                </li>
                                <li>
                                    <a href="#" class="footer__link"> Security</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="footer__title">Support</h3>

                            <ul class="footer__links">
                                <li>
                                    <a href="#" class="footer__link">FAQs </a>
                                </li>
                                <li>
                                    <a href="#" class="footer__link">Support center </a>
                                </li>
                                <li>
                                    <a href="#" class="footer__link"> Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="footer__title">Follow us</h3>

                            <ul class="footer__social">
                                <a href="#" class="footer__social-link">
                                    <i class="bx bxl-facebook-circle"></i>
                                </a>
                                <a href="#" class="footer__social-link">
                                    <i class="bx bxl-instagram-alt"></i>
                                </a>
                                <a href="#" class="footer__social-link">
                                    <i class="bx bxl-pinterest"></i>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="footer__info container">
                    <span class="footer__copy"> &#169; ypcode. All rigths reserved </span>
                    <div class="footer__privacy">
                        <a href="#">Terms & Agreements</a>
                        <a href="#">Privacy Policy</a>
                    </div>
                </div>
            </footer>

            <!--========== SCROLL UP ==========-->
            <a href="#" class="scrollup" id="scroll-up">
                <i class="bx bx-chevrons-up"></i>
            </a>

            <!--=============== SCROLLREVEAL ===============-->
            <script src="./assets_detail/libraries/scrollreveal.min.js"></script>

            <!--=============== SWIPER JS ===============-->
            <script src="./assets_detail/libraries/swiper-bundle.min.js"></script>

            <!--=============== MAIN JS ===============-->
            <script src="./assets_detail/js/main.js"></script>
        </body>

        <?php
    }
    ?>
    <!-- ... konten HTML selanjutnya ... -->
    <?php
}

$stmt->close();
$conn->close();

echo "Invalid request";
?>