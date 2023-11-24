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
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Kategori</h1>
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
                            if (isset($_GET['kode_kategori'])) {
                                $kode_kategori = $_GET['kode_kategori'];
                                $query = mysqli_query($koneksi, "SELECT * FROM data_kategori WHERE kode_kategori = '$kode_kategori'");
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
                                        action="edit_aksi_kategori.php" method="post" enctype="multipart/form-data"
                                        name="form1" id="form1">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Kode Kategori</label>
                                            <div class="col-sm-8">
                                                <!-- Check if $data['kode_kategori'] is set before echoing -->
                                                <input name="kode_kategori" type="text" id="kode_kategori"
                                                    class="form-control"
                                                    value="<?php echo isset($data['kode_kategori']) ? $data['kode_kategori'] : ''; ?>"
                                                    readonly />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                            <div class="col-sm-8">
                                                <!-- Check if $data['kategori'] is set before echoing -->
                                                <input name="kategori" type="text" id="kategori" class="form-control"
                                                    value="<?php echo isset($data['kategori']) ? $data['kategori'] : ''; ?>"
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