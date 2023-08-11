<?php
include 'config/database.php';

if ($_GET['action'] == "table_data") {

  // List kolom
  $columns = array(
    0 => 'id_mahasiswa',
    1 => 'nama',
    2 => 'prodi',
    3 => 'jk',
    4 => 'telepon',
    5 => 'id_mahasiswa'
  );

  // Menghitung jumlah data dari tabel mahasiswa
  $querycount = $db->query("SELECT count(id_mahasiswa) as jumlah FROM mahasiswa");
  $datacount = $querycount->fetch_array();

  $totalData = $datacount['jumlah'];

  $totalFiltered = $totalData;

  $limit = $_POST['length'];
  $start = $_POST['start'];
  $order = $columns[$_POST['order']['0']['column']];
  $dir   = $_POST['order']['0']['dir'];

  // Jika tidak ada pencarian data jalankan query berikut
  if (empty($_POST['search']['value'])) {
    $query = $db->query("SELECT id_mahasiswa,nama,prodi,jk,telepon FROM mahasiswa ORDER BY $order $dir LIMIT $limit OFFSET $start");
  } else {
    // Jika ada pencarian data jalankan query berikut
    $search = $_POST['search']['value'];
    $query = $db->query("SELECT id_mahasiswa,nama,prodi,jk,telepon FROM mahasiswa WHERE nama LIKE '%$search%' OR telepon LIKE '%$search%' ORDER BY $order $dir LIMIT $limit OFFSET $start");

    $querycount = $db->query("SELECT count(id_mahasiswa) as jumlah FROM mahasiswa WHERE nama LIKE '%$search%' OR telepon LIKE '%$search%'");

    $datacount = $querycount->fetch_array();
    $totalFiltered = $datacount['jumlah'];
  }

  $data = array();
  if (!empty($query)) {
    $no = $start + 1;
    while ($value = $query->fetch_array()) {
      $nestedData['no'] = $no;
      $nestedData['nama'] = $value['nama'];
      $nestedData['prodi'] = $value['prodi'];
      $nestedData['jk'] = $value['jk'];
      $nestedData['telepon'] = $value['telepon'];
      $nestedData['aksi'] = '';
      $data[] = $nestedData;
      $no++;
    }
  }

  $json_data = [
    "draw"            => intval($_POST['draw']),
    "recordsTotal"    => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data"            => $data
  ];

  echo json_encode($json_data);
}
