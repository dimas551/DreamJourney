<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Destinasi</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                        </div>
                        <div class="card-body">

                            <?php
                            include 'koneksi.php';
                            // Check if kode_kategori is set in the URL
                            if (isset($_GET['kode_destinasi'])) {
                                $kode_destinasi = $_GET['kode_destinasi'];
                                $query = mysqli_query($koneksi, "SELECT * FROM data_destinasi WHERE kode_destinasi = '$kode_destinasi'");
                                if ($query) {
                                    $data = mysqli_fetch_array($query);
                                } else {
                                    // Handle query error if needed
                                }
                            } else {
                                // Handle the case where kode_kategori is not provided in the URL
                            }

                            // Display the form if $data is set
                            if (isset($data) && !empty($data)) {
                                ?>


                                <!-- </div> -->
                                <div class="panel-body">
                                    <form class="form-horizontal style-form" style="margin-top: 20px;"
                                        action="edit_aksi_destinasi.php" method="post" enctype="multipart/form-data"
                                        name="form1" id="form1">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Kode Destinasi</label>
                                            <div class="col-sm-8">
                                                <!-- Check if $data['kode_kategori'] is set before echoing -->
                                                <input name="kode_destinasi" type="text" id="kode_destinasi"
                                                    class="form-control"
                                                    value="<?php echo isset($data['kode_destinasi']) ? $data['kode_destinasi'] : ''; ?>"
                                                    readonly />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Nama Destinasi</label>
                                            <div class="col-sm-8">
                                                <!-- Check if $data['kategori'] is set before echoing -->
                                                <input name="nama_destinasi" type="text" id="nama_destinasi"
                                                    class="form-control"
                                                    value="<?php echo isset($data['nama_destinasi']) ? $data['nama_destinasi'] : ''; ?>"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                                            <div class="col-sm-8">
                                                <input name="gambar" type="file" id="gambar" class="form-control"
                                                    value="<?php echo isset($data['gambar']) ? $data['gambar'] : ''; ?>"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                            <div class="col-sm-8">
                                                <?php
                                                include "koneksi.php";

                                                if (!$koneksi) {
                                                    die("Connection failed: " . mysqli_connect_error());
                                                }

                                                $sql = "SELECT * FROM data_kategori";
                                                $result = mysqli_query($koneksi, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $isChecked = isset($data['kode_kategori']) && $data['kode_kategori'] === $row['kode_kategori'] ? 'checked' : '';
                                                        echo '<label><input type="radio" name="kode_kategori" value="' . $row['kode_kategori'] . '" ' . $isChecked . ' required> ' . $row['kategori'] . '</label><br>';
                                                    }
                                                }

                                                mysqli_close($koneksi);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Informasi</label>
                                            <div class="col-sm-8">
                                                <!-- Check if $data['kategori'] is set before echoing -->
                                                <input name="informasi" type="text" id="informasi" class="form-control"
                                                    value="<?php echo isset($data['informasi']) ? $data['informasi'] : ''; ?>"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                                            <div class="col-sm-8">
                                                <!-- Check if $data['kategori'] is set before echoing -->
                                                <input name="harga" type="text" id="harga" class="form-control"
                                                    value="<?php echo isset($data['harga']) ? $data['harga'] : ''; ?>"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Kuliner</label>
                                            <div class="col-sm-8">
                                                <!-- Check if $data['kategori'] is set before echoing -->
                                                <input name="kuliner" type="text" id="kuliner" class="form-control"
                                                    value="<?php echo isset($data['kuliner']) ? $data['kuliner'] : ''; ?>"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <!-- Check if $data['kategori'] is set before echoing -->
                                                <input name="alamat" type="text" id="alamat" class="form-control"
                                                    value="<?php echo isset($data['alamat']) ? $data['alamat'] : ''; ?>"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Map</label>
                                            <div class="col-sm-8">
                                                <!-- Check if $data['kategori'] is set before echoing -->
                                                <input name="map" type="text" id="map" class="form-control"
                                                    value="<?php echo isset($data['map']) ? $data['map'] : ''; ?>"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-8">
                                                <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                            </div>
                                        </div>
                                        <div style="margin-top: 20px;"></div>
                                    </form>
                                </div>
                                <?php
                            } else {
                                // Handle the case where $data is not set or empty (e.g., show an error message)
                                echo "No data found for the provided kode_kategori.";
                            }
                            ?>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>