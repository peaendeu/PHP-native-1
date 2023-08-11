<?php
$title = 'Tambah Barang';
include 'layout/header.php';
// Mengecek apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (create_barang($_POST) > 0) {
    echo "<script>
            alert('Data barang berhasil ditambahkan.');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('Data barang gagal ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  }
}
?>
<div class="container my-3">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h1>Tambah Barang</h1>
      <hr>
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
  </div>
</div>
<?php include 'layout/footer.php' ?>