<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamJourney</title>
    <link rel="icon" href="assets/img/6.png">
    <link rel="stylesheet" href="./assets/css/style_all.css">
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
</head>

<body>
    <!-- 
        - #PACKAGE
    -->

    <section class="package" id="package">
        <div class="container">

            <ul class="package-list">

                <?php
                include "koneksi.php";

                $query = "SELECT dd.*, dk.kategori 
                FROM data_destinasi dd 
                INNER JOIN data_kategori dk ON dd.kode_kategori = dk.kode_kategori
                ORDER BY dd.kode_destinasi ASC";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $kode_destinasi = $row['kode_destinasi'];
                        $nama_destinasi = $row['nama_destinasi'];
                        $gambar = '../upload/' . $row['gambar'];
                        $kode_kategori = $row['kode_kategori'];
                        $kategori = $row['kategori'];
                        $informasi = $row['informasi'];
                        $info = (strlen($informasi) > 80) ? substr($informasi, 0, 80) . '...' : $informasi;
                        $harga = $row['harga'];
                        $kuliner = $row['kuliner'];
                        $alamat = $row['alamat'];
                        $map = $row['map'];

                        $query_total_komentar = "SELECT COUNT(*) as total_komentar FROM data_komentar WHERE kode_destinasi = '$kode_destinasi'";
                        $result_total_komentar = mysqli_query($conn, $query_total_komentar);

                        if ($result_total_komentar) {
                            $row_total_komentar = mysqli_fetch_assoc($result_total_komentar);
                            $total_komentar = $row_total_komentar['total_komentar'];
                        } else {
                            $total_komentar = 0;
                        }

                        echo '<li>
                            <div class="package-card">
                                <figure class="card-banner">
                                    <img src="' . $gambar . '" alt="' . $nama_destinasi . '" loading="lazy">
                                </figure>
                                <div class="card-content">
                                    <h3 class="h3 card-title">' . $nama_destinasi . '</h3>
                                    <p class="card-text">' . $info . '</p>
                                    <ul class="card-meta-list">
                                        <li class="card-meta-item">
                                            <div class="meta-box">
                                                <ion-icon name="time"></ion-icon>
                                                <p class="text">' . $kategori . '</p>
                                            </div>
                                        </li>
                                        <li class="card-meta-item">
                                            <div class="meta-box">
                                                <ion-icon name="people"></ion-icon>
                                                <p class="text">' . $alamat . '</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-price">
                                    <div class="wrapper">
                                        <p class="price">' . $total_komentar . '<span>Total Review</span></p>
                                    </div>
                                    <a class="btn btn-secondary" href="detail.php?kode_destinasi=' . $kode_destinasi . '">Lihat Detail</a>
                                </div>  
                            </div>
                        </li>';
                    }
                }
                ?>
            </ul>
        </div>
    </section>
</body>

</html>