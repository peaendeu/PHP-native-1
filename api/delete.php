<?php
// Me-render halaman menjadi Json
header('Content-Type: application/json');
require '../config/app.php';

// Menerima request put/delete
parse_str(file_get_contents('php://input'), $delete);

// Menerima input id data yang akan dihapus
$id_barang = $delete['id_barang'];

// Query hapus data
$query = "DELETE FROM barang WHERE id_barang = $id_barang";
mysqli_query($db, $query);

// Mengecek status data
if ($query) {
  echo json_encode(['pesan' => 'Data barang berhasil dihapus.']);
} else {
  echo json_encode(['pesan' => 'Data barang gagal dihapus!']);
}
