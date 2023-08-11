<?php
$title = 'Tambah Mahasiswa';
include 'layout/header.php';
// Mengecek apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (create_mahasiswa($_POST) > 0) {
    echo
    "<script>
      document.location.href = 'mahasiswa.php';
      alert('Mahasiswa berhasil ditambahkan.');
    </script>";
  } else {
    echo
    "<script>
      document.location.href = 'mahasiswa.php';
      alert('Mahasiswa gagal ditambahkan!');
    </script>";
  }
}
?>
<div class="container my-3">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h1>Tambah Mahasiswa</h1>
      <hr>
      <form action="" method="post" class="col-md-4" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Mahasiswa</label>
          <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" autofocus>
        </div>
        <div class="mb-3">
          <label for="prodi" class="form-label">Program Studi</label>
          <input class="form-control" list="datalistOptions" name="prodi" id="prodi">
          <datalist id="datalistOptions">
            <option value="Arsitektur">
            <option value="Hukum">
            <option value="Teknik Elektro">
            <option value="Teknik Informatika">
            <option value="Teknik Mesin">
            <option value="Teknik Sipil">
            <option value="Sastra Arab">
            <option value="Sastra Inggris">
            <option value="Sastra Jepang">
            <option value="Sastra Korea">
            <option value="Sistem Informasi">
          </datalist>
        </div>
        <div class="mb-3">
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <select name="jk" id="jk" class="form-control">
            <option value="null"></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="telepon" class="form-label">Telepon</label>
          <input type="number" class="form-control" id="telepon" name="telepon" autocomplete="off">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" autocomplete="off">
        </div>
        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <img src="" alt="" class="img-preview d-block" width="150">
          <input type="file" class="form-control" id="foto" name="foto" autocomplete="off" onchange="previewImg()">
        </div>
        <button type="submit" class="btn btn-dark" id="tambah" name="tambah">Tambah</button>
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