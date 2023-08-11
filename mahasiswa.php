<?php
$title = 'Daftar Mahasiswa';
include 'layout/header.php';

if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3) {
  echo
  "<script>
    alert('Anda tidak punya akses.')
    document.location.href = 'crud-modal.php'
  </script>";
  exit;
}
// Menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Mahasiswa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="container mt-2 ">
              <a href="tambah-mahasiswa.php" class="btn btn-sm btn-dark mb-3"><i class="fas fa-plus"></i> Mahasiswa</a>
              <div class="row justify-content-center">
                <table class="table table-striped mt-2 " id="table">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Prodi</th>
                      <th class="text-center">Jenis Kelamin</th>
                      <th class="text-center">Telepon</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                      <tr>
                        <td class="text-center"><?= $no; ?></td>
                        <td class="text-center"><?= $mahasiswa['nama']; ?></td>
                        <td class="text-center"><?= $mahasiswa['prodi']; ?></td>
                        <td class="text-center"><?= $mahasiswa['jk']; ?></td>
                        <td class="text-center"><?= $mahasiswa['telepon']; ?></td>
                        <td class="text-center" width="25%">
                          <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-sm btn-outline-dark">Detail</a>
                          <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-sm btn-outline-dark">Ubah</a>
                          <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-sm btn-outline-dark" onclick="return confirm('Hapus data no. <?= $no; ?>?')">Hapus</a>
                        </td>
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </div>
      </section>
      <!-- /.content -->
    </div>
  </section>
</div>
<!-- /.content-wrapper -->
<?php include 'layout/footer.php'; ?>