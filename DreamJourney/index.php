<?php
session_start();

if (isset($_SESSION['email'])) {
    $headerText = '<img src="landing/assets/images/user_icon.svg" alt="Logout" height="30">';
    $headerLink = "login/logout.php";
} else {
    $headerText = "Masuk";

    $headerLink = "login/login.php";
    $registerText = "Daftar";
    $registerLink = "login/register.php";
}

include "landing/koneksi.php";
$query1 = "SELECT dd.*, dk.kategori, COUNT(dkm.kode_destinasi) AS jumlah_komentar
    FROM data_destinasi dd 
    INNER JOIN data_kategori dk ON dd.kode_kategori = dk.kode_kategori
    LEFT JOIN data_komentar dkm ON dd.kode_destinasi = dkm.kode_destinasi
    GROUP BY dd.kode_destinasi
    ORDER BY jumlah_komentar DESC
    LIMIT 3";

$query2 = "SELECT dd.*, dk.kategori
    FROM data_destinasi dd 
    INNER JOIN data_kategori dk ON dd.kode_kategori = dk.kode_kategori
    GROUP BY dd.kode_destinasi, dk.kategori
    ORDER BY dd.kode_destinasi DESC
    LIMIT 3";

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $search = mysqli_real_escape_string($conn, $search); // Prevent SQL Injection
    $searchQuery = "SELECT * FROM data_destinasi WHERE kode_destinasi LIKE '%$search%' OR nama_destinasi LIKE '%$search%'";
    $searchResult = mysqli_query($conn, $searchQuery);

    if (mysqli_num_rows($searchResult) > 0) {
        $row = mysqli_fetch_assoc($searchResult);
        $kode_destinasi = $row['kode_destinasi'];
        $nama_destinasi = $row['nama_destinasi'];

        // Redirect to detail page if a single result is found
        header("Location: landing/detail.php?kode_destinasi=$kode_destinasi");
        exit();
    } else {
        // Handle case when no results found
        echo '<script>alert("Destinasi tidak ditemukan.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamJourney</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="assets/img/6.png">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/vendor/glightbox/css/glightbox.min.css">
    <link rel="stylesheet" href="assets/vendor/remixicon/remixicon.css">
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        ::-webkit-scrollbar {
            width: 0.6rem;
            border-radius: 0.5rem;
            background-color: transparent;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 0.5rem;
            background-color: rgba(255, 255, 255, 0.5);
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 255, 255, 0.7);
        }

        #searchInput::placeholder {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        #searchInput.placeholder-show::placeholder {
            opacity: 1;
        }

        #hero h1 {
            transition: opacity 0.5s ease-in-out;
        }
    </style>

    <script>
        window.onload = function () {
            var h1Element = document.querySelector('#hero h1');
            var texts = ["Hai kamu, mau kemana?", "Semua ada di DreamJourney", "Apa aja bisa dengan DreamJourney"];
            var index = 0;

            function changeText() {
                h1Element.style.opacity = 0;
                setTimeout(function () {
                    h1Element.textContent = texts[index];
                    h1Element.style.opacity = 1;
                    index = (index + 1) % texts.length;
                }, 400);
            }
            setInterval(changeText, 5000);
        }
    </script>

</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="index.php"><img src="assets/img/2.png" alt="" class="img-fluid"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="<?php echo $headerLink; ?>">
                            <?php echo $headerText; ?>
                        </a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <section id="hero">
        <div class="hero-container">
            <h1>Hai kamu, mau kemana?</h1>
            <div class="col-md-6">
                <form id="searchForm">
                    <div class="form">
                        <i class="fa fa-search"></i>
                        <input name="search" type="text" class="form-control form-input" id="searchInput"
                            placeholder="Search anything...">
                    </div>
                </form>
            </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var searchInput = document.getElementById("searchInput");
            var destinations = ["Liburan ke Malang", "Liburan ke Surabaya", "Liburan ke Padang", "Liburan ke Jakarta", "Liburan ke Palembang", "Semua Bisa Dengan DreamJourney"];
            var currentIndex = 0;

            function updatePlaceholder() {
                searchInput.classList.remove('placeholder-show');
                setTimeout(function () {
                    searchInput.placeholder = destinations[currentIndex];
                    searchInput.classList.add('placeholder-show');
                    currentIndex = (currentIndex + 1) % destinations.length;
                }, 300);
            }

            updatePlaceholder();

            setInterval(updatePlaceholder, 3300);
        });

        document.addEventListener("DOMContentLoaded", function () {
            var searchInput = document.getElementById("searchInput");
            var form = document.getElementById("searchForm");

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                var searchTerm = searchInput.value.trim();
                if (searchTerm !== '') {
                    window.location.href = 'index.php?search=' + encodeURIComponent(searchTerm);
                } else {
                    // Handle empty search
                    alert("Masukkan kata kunci untuk mencari destinasi.");
                }
            });

        });
    </script>

    <section class="popular" id="destination">
        <div class="container">
            <h2 class="text section-title">Destinasi Populer</h2>
            <p class="p section-text">
                Keliling Indonesia bersama DreamJourney
                Ada beragam destinasi keren di Indonesia yang harus kamu cobain nih!
            </p>
            <?php
            if ($result1 && mysqli_num_rows($result1) > 0) {
                $destinationHTML = '<ul class="popular-list">';
                while ($row = mysqli_fetch_assoc($result1)) {
                    $kode_destinasi = $row['kode_destinasi'];
                    $nama_destinasi = $row['nama_destinasi'];
                    $gambar = 'upload/' . $row['gambar'];
                    $kategori = $row['kategori'];
                    $informasi = $row['informasi'];
                    $alamat = $row['alamat'];

                    $destinationHTML .= '
                        <li>
                            <a href="landing/detail.php?kode_destinasi=' . $kode_destinasi . '">
                                <div class="popular-kartu">
                                    <div class="kartu-img">
                                        <img src="' . $gambar . '" alt="' . $nama_destinasi . '" loading="lazy">
                                    </div>
                                    <div class="kartu-content">
                                        <p class="kartu-subtitle">
                                            <a href="landing/detail.php?kode_destinasi=' . $kode_destinasi . '">' . $kategori . '</a>
                                        </p>
                                        <h3 class="h3 kartu-title">
                                            <a href="landing/detail.php?kode_destinasi=' . $kode_destinasi . '">' . $nama_destinasi . '</a>
                                        </h3>
                                        <p class="kartu-text">
                                            ' . $alamat . '
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>';
                }
                $destinationHTML .= '</ul>';
                echo $destinationHTML;
            }
            ?>
            <div class="klik-container">
                <a href="landing/all.php" class="klik btn btn-primary">Lihat Semua</a>
            </div>
    </section>

    <section class="popular" id="destination">
        <div class="container">
            <h2 class="text section-title">Destinasi Terbaru</h2>
            <p class="p section-text">
                Banyak Destinasi wisata baru di DreamJourney
                Banyak destinasi keren yang harus kamu cobain!
            </p>
            <?php
            if ($result2 && mysqli_num_rows($result2) > 0) {
                $destinationHTML = '<ul class="popular-list">';
                while ($row = mysqli_fetch_assoc($result2)) {
                    $kode_destinasi = $row['kode_destinasi'];
                    $nama_destinasi = $row['nama_destinasi'];
                    $gambar = 'upload/' . $row['gambar'];
                    $kategori = $row['kategori'];
                    $informasi = $row['informasi'];
                    $alamat = $row['alamat'];

                    $destinationHTML .= '
                        <li>
                            <a href="landing/detail.php?kode_destinasi=' . $kode_destinasi . '">
                                <div class="popular-kartu">
                                    <div class="kartu-img">
                                        <img src="' . $gambar . '" alt="' . $nama_destinasi . '" loading="lazy">
                                    </div>
                                    <div class="kartu-content">
                                        <p class="kartu-subtitle">
                                            <a href="landing/detail.php?kode_destinasi=' . $kode_destinasi . '">' . $kategori . '</a>
                                        </p>
                                        <h3 class="h3 kartu-title">
                                            <a href="landing/detail.php?kode_destinasi=' . $kode_destinasi . '">' . $nama_destinasi . '</a>
                                        </h3>
                                        <p class="kartu-text">
                                            ' . $alamat . '
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>';
                }
                $destinationHTML .= '</ul>';
                echo $destinationHTML;
            }
            ?>
            <div class="klik-container">
                <a href="landing/all.php" class="klik btn btn-primary">Lihat Semua</a>
            </div>
    </section>

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>&copy; 2022-2023 DreamJourney. All Rights Reserved.</span>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>