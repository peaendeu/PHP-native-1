<?php
session_start();
include 'config/app.php';
// Mengecek apakah tombol log in ditekan
if (isset($_POST['login'])) {
  // Mengambil input username dan password
  $username = mysqli_escape_string($db, $_POST['username']);
  $password = mysqli_escape_string($db, $_POST['password']);
  // Mengecek username
  $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");
  // Mengecek password jika ada username-nya
  if (mysqli_num_rows($result) == 1) {
    $hasil = mysqli_fetch_assoc($result);
    if (password_verify($password, $hasil['password'])) {
      // Membuat session
      $_SESSION['login']    = true;
      $_SESSION['id_akun']  = $hasil['id_akun'];
      $_SESSION['nama']     = $hasil['nama'];
      $_SESSION['username'] = $hasil['username'];
      $_SESSION['email']    = $hasil['email'];
      $_SESSION['level']    = $hasil['level'];

      // Mengarahkan ke file index.php jika username dan password benar
      header('Location: index');
      exit;
    }
  }
  // Mengecek jika username/password salah
  $error = true;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Login Page</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <main class="form-signin">
    <form action="" method="post">
      <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="bootstrap-logo.svg" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Login Page</h1>
      <?php if (isset($error)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Username/password salah!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <div class="form-floating">
        <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com" autocomplete="off" required autofocus>
        <label for="username">Username</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required>
        <label for="password">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-dark" type="submit" name="login" id="login">Masuk</button>
      <p class="mt-1 mb-3 text-muted">&copy;Danpu <?= date('Y'); ?></p>
    </form>
  </main>
</body>

</html>