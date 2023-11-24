<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamJourney</title>
    <link rel="icon" href="asset/logo/5.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<link rel=" preconnect href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
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
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>LOGIN</h2>
        <div id="error-message" style="color: red;"></div>
        <form method="post" action="submit_login.php">
            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class="fas fa-eye" id="password-toggle-1"
                    onclick="togglePasswordVisibility('password', 'password-toggle-1')"></i>
            </div>
            <div class="input-box button">
                <input type="Submit" value="Log in">
            </div>
            <div class="text">
                <h3>Belum Punya Akun? <a href="register.php">Register dulu</a></h3>
            </div>
        </form>
    </div>
    <!-- ... previous HTML code ... -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const errorMessage = "<?php echo isset($error_message) ? $error_message : ''; ?>";
            if (errorMessage) {
                document.getElementById("error-message").innerHTML = errorMessage;
            }
        });

        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>

</html>