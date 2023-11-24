<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamJourney - Kategori</title>
    <link rel="stylesheet" href="sidebar.html">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css " rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.css" rel="stylesheet">
    <?php include "header.php"; ?>
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="judul m-0 font-weight-bold">Data Komentar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Destinasi</th>
                                            <th>Komentar</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $data = mysqli_query($koneksi, "SELECT dk.kode_komentar, du.username, dd.nama_destinasi, dk.komentar, dk.tanggal 
                                        FROM data_komentar dk 
                                        INNER JOIN data_user du ON dk.email = du.email
                                        INNER JOIN data_destinasi dd ON dk.kode_destinasi = dd.kode_destinasi");
                                        while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $d['kode_komentar']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $d['username']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $d['nama_destinasi']; ?> <!-- Mengubah kolom Destinasi -->
                                                </td>
                                                <td>
                                                    <?php echo $d['komentar']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $tanggal = date_create($d['tanggal']);
                                                    echo date_format($tanggal, 'd F Y');
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="hapus_komentar.php?komentar=<?php echo $d['kode_komentar']; ?>"
                                                        class="btn btn-sm btn-danger">
                                                        <span class="bi bi-trash">Delete</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>
</body>

</html>