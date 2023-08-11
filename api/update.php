<?php
// Me-render halaman menjadi Json
header('Content-Type: application/json');
require '../config/app.php';

parse_str(file_get_contents('php://input'), $put);

// Menerima input
$id_barang = $put['id_barang'];
$nama      = $put['nama'];
$jumlah    = $put['jumlah'];
$harga     = $put['harga'];

// validasi data
if ($nama == null) {
  echo json_encode(['pesan' => 'Nama barang tidak boleh kosong.']);
  exit;
}

// Query ubah data
$query = "UPDATE barang 
          SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' 
          WHERE id_barang = '$id_barang'";
mysqli_query($db, $query);

// Mengecek status data
if ($query) {
  echo json_encode(['pesan' => 'Data barang berhasil diubah.']);
} else {
  echo json_encode(['pesan' => 'Data barang gagal diubah!']);
}
