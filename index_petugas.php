<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="icon" type="image/png" href="img/enter.png" />
    <style>
      .alert {
        color: white;
        padding: 10px;
        text-align: center;     
      }
    </style>
  </head>

  <body>
    <?php
      if(isset($_GET['pesan'])) {
        if($_GET['pesan']=="gagal") {
          echo "<div class='alert'>Username dan password tidak sesuai!!!</div>";
        }
      }
    ?>

    <div class="login-page">
      <div class="form">
      <h2>LOGIN STAFF</h2>
        <form action="p_login_petugas.php" method="post" class="login-form">
          <input type="text" placeholder="Username" name="username"/>
          <input type="password" placeholder="Password" name="password"/>
          <button type="submit">login</button>
          <p class="message">Belum punya akun? <a href="reg_petugas.php">Buat akun</a></p>
        </form>
      </div>
    </div>

    <script src="js/login.js"></script>
  </body>
</html>