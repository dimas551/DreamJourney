<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DreamJourney</title>
  <link rel="icon" href="asset/logo/5.png" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
    <h2>SIGN IN</h2>
    <form method="post" action="submit_register.php">
      <div class="input-box">
        <input type="email" name="email" id="email" placeholder="Email" required>
      </div>
      <div class="input-box">
        <input type="text" name="nama" id="nama" placeholder="Nama" required>
      </div>
      <div class="input-box">
        <select name="jenis_kelamin" id="jenis_kelamin" required>
          <option value="" disabled selected>Jenis Kelamin</option>
          <option value="L">Laki-Laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>
      <div class="input-box">
        <input type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" required>
      </div>
      <div class="input-box">
        <input type="text" name="no_telpon" id="no_telpon" placeholder="No. Telpon" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="fas fa-eye" id="password-toggle-1"
          onclick="togglePasswordVisibility('password', 'password-toggle-1')"></i>
      </div>
      <div class="input-box">
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Ulangi password" required>
        <i class="fas fa-eye" id="password-toggle-2"
          onclick="togglePasswordVisibility('confirm_password', 'password-toggle-2')"></i>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Sign in">
      </div>
      <div class="text">
        <h3>Udah punya akun? <a href="login.php">Log in aja</a></h3>
      </div>
    </form>
  </div>

  <script>
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