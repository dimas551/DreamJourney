<!DOCTYPE html>
<html lang="en">
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

    textarea {
        width: 100%;
        box-sizing: border-box;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    #imagePreview {
        width: 100%;
        height: auto;
        border-radius: 10px;
        margin-top: 5px;
    }
</style>

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Destinasi</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                        </div>
                        <div class="card-body">

                            <!-- Main content -->
                            <form class="form-horizontal style-form" style="margin-top: 10px;"
                                action="insert_aksi_destinasi.php" method="post" enctype="multipart/form-data"
                                name="form1" id="form1">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Nama</label>
                                    <div class="col-sm-6">
                                        <input name="nama_destinasi" class="form-control" type="text" placeholder=""
                                            required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Gambar</label>
                                    <div class="col-sm-6">
                                        <input name="gambar" class="form-control" type="file" id="gambarInput"
                                            required />
                                        <img id="imagePreview"
                                            style="object-fit: cover; max-width: 100%; max-height: 200px; display: none; border-radius: 10px;" />
                                    </div>
                                </div>

                                <script>
                                    // Function to update the image preview
                                    function updateImagePreview() {
                                        var input = document.getElementById('gambarInput');
                                        var imagePreview = document.getElementById('imagePreview');

                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                imagePreview.src = e.target.result;
                                                imagePreview.style.display = 'block';
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            imagePreview.style.display = 'none';
                                        }
                                    }

                                    var fileInput = document.getElementById('gambarInput');
                                    fileInput.addEventListener('change', updateImagePreview);
                                </script>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Kategori :</label>
                                    <div class="col-sm-6">
                                        <?php
                                        include "koneksi.php";

                                        if (!$koneksi) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }

                                        $sql = "SELECT * FROM data_kategori";
                                        $result = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<label><input type="radio" name="kode_kategori" value="' . $row['kode_kategori'] . '" required> ' . $row['kategori'] . '</label><br>';
                                            }
                                        }

                                        mysqli_close($koneksi);
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Informasi</label>
                                    <div class="col-sm-6">
                                        <textarea id="informasi" name="informasi" class="form-control"
                                            required></textarea>
                                    </div>
                                </div>

                                <script>
                                    function autoResizeTextarea() {
                                        const textarea = document.getElementById("informasi");
                                        textarea.style.height = "auto";
                                        textarea.style.height = textarea.scrollHeight + "px";
                                    }

                                    const textarea = document.getElementById("informasi");
                                    textarea.addEventListener("input", autoResizeTextarea);

                                    window.addEventListener("load", autoResizeTextarea);
                                </script>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Harga Tiket Masuk</label>
                                    <div class="col-sm-6">
                                        <input type="radio" name="harga_option" value="gratis" id="harga_gratis"
                                            required>
                                        <label for="harga_gratis">Gratis</label>
                                        <br>
                                        <input type="radio" name="harga_option" value="custom" id="harga_custom"
                                            required>
                                        <label for="harga_custom">Rp.</label>
                                        <div id="custom_harga_container" style="display: none;">
                                            <input name="harga" class="form-control" type="text" id="custom_harga"
                                                placeholder="10000" required>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    const hargaGratisRadio = document.getElementById('harga_gratis');
                                    const hargaCustomRadio = document.getElementById('harga_custom');
                                    const customHargaContainer = document.getElementById('custom_harga_container');
                                    const customHargaInput = document.getElementById('custom_harga');

                                    hargaGratisRadio.addEventListener('change', () => {
                                        customHargaContainer.style.display = 'none';
                                        customHargaInput.value = ''; // Clear the input value when Gratis is selected
                                        customHargaInput.removeAttribute('required'); // Remove the 'required' attribute
                                    });

                                    hargaCustomRadio.addEventListener('change', () => {
                                        customHargaContainer.style.display = 'block';
                                        customHargaInput.setAttribute('required', true); // Add 'required' attribute when Rp. is selected
                                    });
                                </script>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Kuliner</label>
                                    <div class="col-sm-6">
                                        <input name="kuliner" class="form-control" type="text" placeholder=""
                                            required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Alamat</label>
                                    <div class="col-sm-6">
                                        <input name="alamat" class="form-control" type="text" placeholder="" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Map</label>
                                    <div class="col-sm-6">
                                        <input name="map" class="form-control" type="text" placeholder="" required />
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