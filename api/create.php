<?php
// Me-render halaman menjadi Json
header('Content-Type: application/json');
require '../config/app.php';

// Menerima input
$nama   = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga  = $_POST['harga'];

// validasi data
if ($nama == null) {
  echo json_encode(['pesan' => 'Nama barang tidak boleh kosong.']);
  exit;
}

// Query tambah data
$query = "INSERT INTO barang VALUES (null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";
mysqli_query($db, $query);

// Mengecek status data
if ($query) {
  echo json_encode(['pesan' => 'Data barang berhasil ditambahkan.']);
} else {
  echo json_encode(['pesan' => 'Data barang gagal ditambahkan!']);
}
