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

$jumlahDataPerHalaman = 2;
$jumlahData = count(select('SELECT * FROM barang'));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC LIMIT $awalData, $jumlahDataPerHalaman");
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
                  <div class="row m-1">
                    <a href="tambah-barang.php" class="btn btn-sm btn-dark m-1"><i class="fas fa-plus"></i> Barang</a>
                    <!-- <button type="button" class="btn btn-sm btn-dark m-1" data-toggle="modal" data-target="#modalFilter"><i class="fas fa-search"></i> Filter</button> -->
                  </div>
                  <table class="table table-bordered table-hover">
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
                          <td class="text-center"><?= $awalData + 1; ?></td>
                          <td class="text-center"><?= $barang['nama']; ?></td>
                          <td class="text-center"><?= number_format($barang['jumlah'], 0, ',', '.'); ?></td>
                          <td class="text-center">Rp. <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
                          <td class="text-center">
                            <?= date('d M Y/H:i:s', strtotime($barang['tanggal'])) ?>
                          </td>
                          <td class="text-center">
                            <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-sm btn-outline-dark"><i class="fas fa-edit"></i></a>
                            <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-sm btn-outline-dark" onclick="return confirm('Hapus data no. <?= $no; ?>?')"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                        <?php $awalData++ ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <div class="mt-2 justify-content-center d-flex">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <?php if ($halamanAktif > 1) : ?>
                          <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                          <?php if ($i == $halamanAktif) : ?>
                            <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                          <?php else :  ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                          <?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                          <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>
                        <?php endif; ?>
                      </ul>
                    </nav>
                  </div>
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

<!-- Modal Filter -->
<div class="modal fade" id="modalFilter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalFilterLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFilterLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<?php include 'layout/footer.php' ?>