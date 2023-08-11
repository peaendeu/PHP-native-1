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
<div class="container mt-2 ">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h1>Data Barang</h1>
      <hr>
      <a href="tambah-barang.php" class="btn btn-sm btn-dark mb-3"><i class="fas fa-plus-circle"></i> Tambah</a>
      <table class="table table-striped mt-2" id="table">
        <thead>
          <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Barcode</th>
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
              <td>
                <img alt="Barcode" src="barcode.php?text=testing">
              </td>
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
  </div>
</div>
<?php include 'layout/footer.php' ?>