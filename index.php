<?php
$title = 'Daftar Barang';
include 'layout/header.php';

if ($_SESSION['level'] != 1 and $_SESSION['level'] != 2) {
  echo
  "<script>
    alert('Anda tidak punya akses.')
    document.location.href = 'mahasiswa.php'
  </script>";
  exit;
}

$data_barang = select('SELECT * FROM barang ORDER BY id_barang DESC');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Barang</li>
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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel Data Barang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <a href="tambah-barang.php" class="btn btn-sm btn-dark mb-2"><i class="fas fa-plus"></i> Barang</a>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Tanggal/Waktu</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      <?php foreach ($data_barang as $barang) : ?>
                        <tr>
                          <td class="text-center"><?= $no; ?></td>
                          <td class="text-center"><?= $barang['nama']; ?></td>
                          <td class="text-center"><?= number_format($barang['jumlah'], 0, ',', '.'); ?></td>
                          <td class="text-center">Rp. <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
                          <td class="text-center">
                            <?= date('d M Y/H:i:s', strtotime($barang['tanggal'])) ?>
                          </td>
                          <td class="text-center">
                            <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-sm btn-outline-dark"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-sm btn-outline-dark" onclick="return confirm('Hapus data no. <?= $no; ?>?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                          </td>
                        </tr>
                        <?php $no++ ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div><!-- /.container-fluid -->
        </div>
      </section>
      <!-- /.content -->
    </div>
  </section>
</div>
<!-- /.content-wrapper -->

<?php include 'layout/footer.php' ?>