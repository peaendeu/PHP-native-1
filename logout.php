<?php
session_start();
// Membatasi halaman sebelum login
if (!isset($_SESSION['login'])) {
  echo
  "<script>
    alert('Anda harus login terlebih dahulu.')
    document.location.href = 'login'
  </script>";
  exit;
}
// Mengosongkan session user login
$_SESSION = [];
session_unset();
session_destroy();
header('Location: login');
