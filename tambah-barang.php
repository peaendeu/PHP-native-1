<?php
$title = 'Tambah Barang';
include 'layout/header.php';
// Mengecek apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (create_barang($_POST) > 0) {
    echo
    "<script>
      alert('Data barang berhasil ditambahkan.');
      document.location.href = 'index.php';
    </script>";
  } else {
    echo
    "<script>
      alert('Data barang gagal ditambahkan!');
      document.location.href = 'index.php';
    </script>";
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Data Barang</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form action="" method="post" class="col-md-4">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" autofocus required>
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah Barang</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" autocomplete="off" required>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga Barang</label>
          <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-dark" id="tambah" name="tambah">Tambah</button>
      </form>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->
<?php include 'layout/footer.php' ?>