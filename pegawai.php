<?php
$title = 'Daftar Pegawai';
include 'layout/header.php';
$data_pegawai = select('SELECT * FROM pegawai ORDER BY id_pegawai DESC');

if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3) {
  echo
  "<script>
    alert('Anda tidak punya akses.')
    document.location.href = 'crud-modal.php'
  </script>";
  exit;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Pegawai</li>
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
              <div class="row justify-content-center">
                <table class="table table-striped mt-2" id="table">
                  <thead>
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Email</th>
                      <th>Telepon</th>
                      <th>Alamat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($data_pegawai as $pegawai) : ?>
                      <tr class="text-center">
                        <td><?= $no; ?></td>
                        <td><?= $pegawai['nama']; ?></td>
                        <td><?= $pegawai['jabatan']; ?></td>
                        <td><?= $pegawai['email']; ?></td>
                        <td><?= $pegawai['telepon']; ?></td>
                        <td><?= $pegawai['alamat']; ?></td>
                      </tr>
                      <?php $no++ ?>
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