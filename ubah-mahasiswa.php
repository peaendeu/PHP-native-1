<?php
$title = 'Ubah Mahasiswa';
include 'layout/header.php';
// Mengecek apakah tombol ubah ditekan
if (isset($_POST['ubah'])) {
  if (update_mahasiswa($_POST) > 0) {
    echo
    "<script>
      document.location.href = 'mahasiswa.php';
      alert('Mahasiswa berhasil diubah.');
    </script>";
  } else {
    echo
    "<script>
      document.location.href = 'mahasiswa.php';
      alert('Mahasiswa gagal diubah!');
    </script>";
  }
}

// Mengambil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];
// Query mengambil data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'")[0];
?>

<div class="container my-3">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h1>Ubah Mahasiswa</h1>
      <hr>
      <form action="" method="post" class="col-md-4" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id_mahasiswa" id="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
        <input type="hidden" name="fotoLama" id="fotoLama" value="<?= $mahasiswa['foto']; ?>">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Mahasiswa</label>
          <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" autofocus value="<?= $mahasiswa['nama']; ?>">
        </div>
        <div class="mb-3">
          <label for="prodi" class="form-label">Program Studi</label>
          <select name="prodi" id="prodi" class="form-control">
            <?php $prodi = $mahasiswa['prodi'] ?>
            <option value="null"></option>
            <option value="Arsitektur" <?= $prodi == 'Arsitektur' ? 'selected' : null; ?>>Arsitektur</option>
            <option value="Hukum" <?= $prodi == 'Hukum' ? 'selected' : null; ?>>Hukum</option>
            <option value="Manajemen" <?= $prodi == 'Manajemen' ? 'selected' : null; ?>>Manajemen</option>
            <option value="Pendidikan Bisnis" <?= $prodi == 'Pendidikan Bisnis' ? 'selected' : null; ?>>Pendidikan Bisnis</option>
            <option value="Pertanian" <?= $prodi == 'Pertanian' ? 'selected' : null; ?>>Pertanian</option>
            <option value="Teknik Elektro" <?= $prodi == 'Teknik Elektro' ? 'selected' : null; ?>>Teknik Elektro</option>
            <option value="Teknik Informatika" <?= $prodi == 'Teknik Informatika' ? 'selected' : null; ?>>Teknik Informatika</option>
            <option value="Teknik Mesin" <?= $prodi == 'Teknik Mesin' ? 'selected' : null; ?>>Teknik Mesin</option>
            <option value="Teknik Sipil" <?= $prodi == 'Teknik Sipil' ? 'selected' : null; ?>>Teknik Sipil</option>
            <option value="Sastra Arab" <?= $prodi == 'Sastra Arab' ? 'selected' : null; ?>>Sastra Arab</option>
            <option value="Sastra Inggris" <?= $prodi == 'Sastra Inggris' ? 'selected' : null; ?>>Sastra Inggris</option>
            <option value="Sastra Jepang" <?= $prodi == 'Sastra Jepang' ? 'selected' : null; ?>>Sastra Jepang</option>
            <option value="Sastra Korea" <?= $prodi == 'Sastra Korea' ? 'selected' : null; ?>>Sastra Korea</option>
            <option value="Sistem Informasi" <?= $prodi == 'Sistem Informasi' ? 'selected' : null; ?>>Sistem Informasi</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <select name="jk" id="jk" class="form-control">
            <?php $jk = $mahasiswa['jk'] ?>
            <option value=""></option>
            <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null; ?>>Laki-Laki</option>
            <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null; ?>>Perempuan</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="telepon" class="form-label">Telepon</label>
          <input type="number" class="form-control" id="telepon" name="telepon" autocomplete="off" value="<?= $mahasiswa['telepon']; ?>">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea name="alamat" id="alamat"><?= $mahasiswa['alamat'];; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?= $mahasiswa['email']; ?>">
        </div>
        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="<?= $mahasiswa['foto']; ?>" width="150" class="d-block mb-3 img-preview">
          <input type="file" class="form-control" id="foto" name="foto" autocomplete="off" onchange="previewImg()">
        </div>
        <button type="submit" class="btn btn-dark" id="ubah" name="ubah">Ubah</button>
      </form>
    </div>
  </div>
</div>

<script>
  function previewImg() {
    const foto = document.querySelector('#foto')
    const imgPreview = document.querySelector('.img-preview')
    const fileFoto = new FileReader()

    fileFoto.readAsDataURL(foto.files[0])
    fileFoto.onload = function(e) {
      imgPreview.src = e.target.result
    }
  }
</script>

<?php include 'layout/footer.php' ?>