<?php
$title = 'Ubah Barang';
include 'layout/header.php';

// Mengambil id barang dari url
$id_barang = (int)$_GET['id_barang'];
$barang = select("SELECT ALL * FROM barang WHERE id_barang = $id_barang")[0];

// Mengecek apakah tombol tambah ditekan
if (isset($_POST['ubah'])) {
  if (update_barang($_POST) > 0) {
    echo "<script>
            alert('Data barang berhasil diubah.');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('Data barang gagal diubah!');
            document.location.href = 'index.php';
          </script>";
  }
}
?>
<div class="container mt-2 ">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h1>Ubah Barang</h1>
      <hr>
      <form action="" method="post" class="col-md-4">
        <input type="hidden" class="form-control" id="id_barang" name="id_barang" autocomplete="off" value="<?= $barang['id_barang']; ?>">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" autofocus required value="<?= $barang['nama']; ?>">
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah Barang</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" autocomplete="off" required value="<?= $barang['jumlah']; ?>">
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga Barang</label>
          <input type="text" class="form-control" id="harga" name="harga" autocomplete="off" required value="<?= $barang['harga']; ?>">
        </div>
        <button type="submit" class="btn btn-dark" id="ubah" name="ubah">Ubah</button>
      </form>
    </div>
  </div>
</div>
<?php include 'layout/footer.php' ?>