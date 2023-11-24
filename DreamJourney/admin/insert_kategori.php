<!DOCTYPE html>
<html lang="en">

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Kategori</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                        </div>
                        <div class="card-body">
                            <!-- Main content -->
                            <form class="form-horizontal style-form" style="margin-top: 10px;"
                                action="insert_aksi_kategori.php" method="post" enctype="multipart/form-data"
                                name="form1" id="form1">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Kategori</label>
                                    <div class="col-sm-6">
                                        <input name="kategori" class="form-control" type="text" placeholder=""
                                            required />
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                                    </div>
                                </div>
                                <div style="margin-top: 20px;"></div>
                            </form>

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