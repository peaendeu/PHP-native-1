<?php

// Fungsi menampilkan data
function select($query)
{
  global $db;
  $result = mysqli_query($db, $query);
  $rows   = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function create_barang($post)
{
  global $db;

  $nama   = htmlspecialchars($post['nama']);
  $jumlah = htmlspecialchars($post['jumlah']);
  $harga  = htmlspecialchars($post['harga']);

  // Query tambah data
  $query = "INSERT INTO barang VALUES('', '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function update_barang($post)
{
  global $db;

  $id_barang  = htmlspecialchars($post['id_barang']);
  $nama       = htmlspecialchars($post['nama']);
  $jumlah     = htmlspecialchars($post['jumlah']);
  $harga      = htmlspecialchars($post['harga']);

  // Query tambah data
  $query = "UPDATE barang 
            SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' 
            WHERE id_barang = '$id_barang'";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function delete_barang($id_barang)
{
  global $db;
  // Query hapus data barang
  $query = "DELETE FROM barang 
            WHERE id_barang = $id_barang";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function create_mahasiswa($post)
{
  global $db;

  $nama     = htmlspecialchars($post['nama']);
  $prodi    = htmlspecialchars($post['prodi']);
  $jk       = htmlspecialchars($post['jk']);
  $telepon  = htmlspecialchars($post['telepon']);
  $alamat   = $post['alamat'];
  $email    = htmlspecialchars($post['email']);
  $foto     = upload_file();

  // Mengecek upload foto
  if (!$foto) {
    return false;
  }

  // Query tambah data
  $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$prodi', '$jk', '$telepon', '$alamat', '$email', '$foto')";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function update_mahasiswa($post)
{
  global $db;

  $id_mahasiswa = htmlspecialchars($post['id_mahasiswa']);
  $nama         = htmlspecialchars($post['nama']);
  $prodi        = htmlspecialchars($post['prodi']);
  $jk           = htmlspecialchars($post['jk']);
  $telepon      = htmlspecialchars($post['telepon']);
  $alamat       = $post['alamat'];
  $email        = htmlspecialchars($post['email']);
  $fotoLama     = htmlspecialchars($post['fotoLama']);

  // Mengecek upload foto baru atau tidak
  if ($_FILES['foto']['error'] == 4) {
    $foto = $fotoLama;
  } else {
    $foto = upload_file();
  }

  // Query ubah data
  $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', alamat = '$alamat', email = '$email', foto = '$foto' WHERE id_mahasiswa = '$id_mahasiswa'";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function upload_file()
{
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  // Mengecek file yang di-upload
  $extensionFileValid = ['jpg', 'jpeg', 'png'];
  $extensionFile = explode('.', $namaFile);
  $extensionFile = strtolower(end($extensionFile));

  // Mengecek format file
  if (!in_array($extensionFile, $extensionFileValid)) {
    // Pesan gagal
    echo
    "<script>
      alert('Format file tidak valid!');
      document.location.href = 'tambah-mahasiswa.php';
    </script>";
    die();
  }

  // Mengecek file maksimal 2mb
  if ($ukuranFile > 1048000) {
    echo "<script>
      alert('Ukuran file maksimal 2 MB!');
      document.location.href = 'tambah-mahasiswa.php';
    </script>";
    die();
  }

  // Membuat nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $extensionFile;

  // Memindahkan file ke folder lokal
  move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
  return $namaFileBaru;
}

function delete_mahasiswa($id_mahasiswa)
{
  global $db;

  // Mengambil foto sesuai data yang dipilih
  $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'")[0];
  unlink('assets/img/' . $foto['foto']);

  // Query hapus data mahasiswa
  $query = "DELETE FROM mahasiswa 
            WHERE id_mahasiswa = $id_mahasiswa";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function create_akun($post)
{
  global $db;

  $nama     = htmlspecialchars($post['nama']);
  $username = htmlspecialchars($post['username']);
  $email    = htmlspecialchars($post['email']);
  $password = htmlspecialchars($post['password']);
  $level    = htmlspecialchars($post['level']);

  // Mengenkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Query tambah data
  $query = "INSERT INTO akun VALUES('', '$nama', '$username', '$email', '$password', '$level')";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function delete_akun($id_akun)
{
  global $db;
  // Query hapus data akun
  $query = "DELETE FROM akun 
            WHERE id_akun = $id_akun";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function update_akun($post)
{
  global $db;

  $id_akun  = htmlspecialchars($post['id_akun']);
  $nama     = htmlspecialchars($post['nama']);
  $username = htmlspecialchars($post['username']);
  $email    = htmlspecialchars($post['email']);
  $password = htmlspecialchars($post['password']);
  $level    = htmlspecialchars($post['level']);

  // Mengenkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Query tambah data
  $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = '$id_akun'";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}
