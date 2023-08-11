<?php
session_start();

// Membatasi halaman sebelum login
if (!isset($_SESSION['login'])) {
  echo
  "<script>
    alert('Anda harus login terlebih dahulu.')
    document.location.href = 'login.php'
  </script>";
  exit;
}

include 'config/app.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <title><?= $title; ?></title>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index">CRUD PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 2) : ?>
              <a class="nav-link" href="index">Barang</a>
            <?php endif; ?>
            <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 3) : ?>
              <a class="nav-link" href="mahasiswa">Mahasiswa</a>
            <?php endif; ?>
            <a class="nav-link" href="crud-modal">Akun</a>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['nama']; ?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="logout">Keluar</a></li>
          </ul>
        </div>
        <!-- <div>
          <a class="navbar-brand" href="index.php"><?= $_SESSION['nama']; ?></a>
        </div> -->
      </div>
    </nav>
  </div>