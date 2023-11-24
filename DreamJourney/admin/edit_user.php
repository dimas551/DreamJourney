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
                        <h1 class="h3 mb-0 text-gray-800">Edit Data User</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                        </div>
                        <div class="card-body">

                            <?php
                            include 'koneksi.php';
                            $email = $_GET['email'];
                            $query = mysqli_query($koneksi, "SELECT * FROM data_user WHERE email='$email'");
                            $data = mysqli_fetch_array($query);
                            ?>

                            <!-- </div> -->
                            <div class="panel-body">
                            <form class="form-horizontal style-form" style="margin-top: 20px;" action="edit_aksi_user.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                        <div class="col-sm-8">
                                            <input name="email" type="text" id="email" class="form-control"
                                                value="<?php echo $data['email']; ?>" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input name="username" type="text" id="username" class="form-control"
                                                value="<?php echo $data['username']; ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                        <div class="col-sm-8">
                                        <input name="tgl_lahir" type="date" id="tgl_lahir" class="form-control"
                                                value="<?php echo $data['tgl_lahir']; ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-8">
                                            <label class="radio-inline">
                                                <input type="radio" name="jenis_kelamin" value="L"
                                                    <?php if($data['jenis_kelamin'] == 'L') echo 'checked'; ?>> Laki-laki
                                            </label><br>
                                            <label class="radio-inline">
                                                <input type="radio" name="jenis_kelamin" value="P"
                                                    <?php if($data['jenis_kelamin'] == 'P') echo 'checked'; ?>> Perempuan
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">No. Telepon</label>
                                        <div class="col-sm-8">
                                            <input name="no_telpon" class="form-control" id="no_telpon" type="text"
                                                value="<?php echo $data['no_telpon']; ?>" required />
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