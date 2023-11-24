<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Komentar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .comment-section {
            margin-top: 30px;
        }

        .comment {
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            padding: 15px;
        }

        .comment .meta {
            font-size: 14px;
            color: #888;
        }

        .comment .comment-text {
            margin-top: 10px;
        }

        .comment-form {
            margin-top: 30px;
        }

        .comment-form textarea {
            resize: none;
        }

        .comment-form .btn {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <!-- Form for Comment -->
        <div class="comment-form">
            <form method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email"
                        value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="komentar">Masukkan Komentar</label>
                    <textarea class="form-control" id="komentar" name="komentar" rows="5"
                        placeholder="Enter Your Comment"></textarea>
                </div>
                <button type="submit" name="btnkomen" class="btn btn-primary">Kirim</button>
            </form>
        </div>

        <!-- PHP logic for displaying comments -->
        <div class="comment-section">
            <?php
            include 'koneksi.php';

            $id = isset($_GET['kode_destinasi']) ? $_GET['kode_destinasi'] : null;

            if ($id) {
                $id = mysqli_real_escape_string($conn, $id); // Sanitize input
            
                $sql = "SELECT * FROM data_komentar WHERE kode_destinasi = '$id'";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    while ($res = mysqli_fetch_array($query)) {
                        $email = $res['email'];
                        $sql_user = "SELECT username FROM data_user WHERE email = '$email'";
                        $query_user = mysqli_query($conn, $sql_user);

                        if ($query_user) {
                            $user_info = mysqli_fetch_assoc($query_user);
                            $username = $user_info['username'];
                            ?>
                            <div class="comment">
                                <div class="meta">
                                    <span>
                                        <?php echo htmlspecialchars($username); ?>
                                    </span>
                                    <span class="float-right">
                                        <?php echo htmlspecialchars($res['tanggal']); ?>
                                    </span>
                                </div>
                                <div class="comment-text">
                                    <p>
                                        <?php echo htmlspecialchars($res['komentar']); ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        } else {
                            echo "Error: " . mysqli_error($conn); // Handle query error
                        }
                    }
                } else {
                    echo "Error: " . mysqli_error($conn); // Handle query error
                }
            }
            ?>
        </div>

        <?php
        if (isset($_POST['btnkomen'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
            $tanggal = date("Y-m-d"); // Use a proper date format for database
        
            if (empty($email)) {
                echo "<div class='alert alert-danger' role='alert'>Anda Belum Login</div>";
            } else {
                $sql = "INSERT INTO data_komentar (kode_destinasi, email, tanggal, komentar) VALUES ('$id', '$email', '$tanggal', '$komentar')";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo "<div class='alert alert-success' role='alert'>Success</div>";
                    echo "<meta http-equiv='refresh' content='1;url=detail.php?kode_destinasi=" . $id . "'>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error: " . mysqli_error($conn) . "</div>"; // Handle query error
                }
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS and jQuery (place it before the closing body tag) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>