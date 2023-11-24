<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamJourney</title>
    <style>
        .background {
            background-color: #007CFF;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <ul class="background navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon ">
                <img id="logoImage" class="" src="assets/logo/2.png" height="30px" alt="...">
            </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="landing_admin.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Destinasi -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDestinasi"
                aria-expanded="true" aria-controls="collapseDestinasi">
                <i class="fas fa-fw fa-globe"></i>
                <span>Destinasi</span>
            </a>
            <div id="collapseDestinasi" class="collapse" aria-labelledby="headingDestinasi"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Destinasi</h6>
                    <a class="collapse-item" href="destinasi.php">View</a>
                    <a class="collapse-item" href="insert_destinasi.php">Insert</a>
                </div>
            </div>
        </li>

        <!-- Kategori -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategori"
                aria-expanded="true" aria-controls="collapseKategori">
                <i class="fas fa-fw fa-search"></i>
                <span>Kategori</span>
            </a>
            <div id="collapseKategori" class="collapse" aria-labelledby="headingKategori"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kategori</h6>
                    <a class="collapse-item" href="kategori.php">View</a>
                    <a class="collapse-item" href="insert_kategori.php">Insert</a>
                </div>
            </div>
        </li>

        <!-- User -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                aria-expanded="true" aria-controls="collapseUser">
                <i class="fas fa-fw fa-user-friends"></i>
                <span>User</span>
            </a>
            <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User</h6>
                    <a class="collapse-item" href="user.php">View</a>
                    <a class="collapse-item" href="insert_user.php">Insert</a>
                </div>
            </div>
        </li>

        <!-- Komentar -->
        <li class="nav-item">
            <a class="nav-link" href="komentar.php">
                <i class="fas fa-fw fa-comments"></i>
                <span>Komentar</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- JavaScript to toggle the image source -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sidebarToggle = document.getElementById("sidebarToggle");
            const logoImage = document.getElementById("logoImage");

            sidebarToggle.addEventListener("click", function () {
                // Check the current source of the image
                if (logoImage.src.endsWith("2.png")) {
                    // If it's the first image, change it to the second image
                    logoImage.src = "assets/logo/6.png";
                } else {
                    // Otherwise, change it back to the first image
                    logoImage.src = "assets/logo/2.png";
                }
            });
        });
    </script>
</body>

</html>