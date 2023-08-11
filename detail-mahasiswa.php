<?php
$title = 'Detail Mahasiswa';
include 'layout/header.php';
// Mengambil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];
// Menampilkan data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'")[0];
?>
<div class="container my-3">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h1 class="text-center"><?= $mahasiswa['nama']; ?></h1>
      <hr>
      <table class="table table-bordered table-striped mt-2">
        <tr>
          <td>Program Studi</td>
          <td><?= $mahasiswa['prodi']; ?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td><?= $mahasiswa['jk']; ?></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><?= $mahasiswa['telepon']; ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><?= $mahasiswa['alamat']; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?= $mahasiswa['email']; ?></td>
        </tr>
        <tr>
          <td>Foto</td>
          <td><img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="<?= $mahasiswa['foto']; ?>" width="50%"></td>
        </tr>
      </table>
      <a href="mahasiswa.php" class="btn btn-sm btn-outline-dark">Kembali</a>
    </div>
  </div>
</div>
<?php include 'layout/footer.php'; ?>