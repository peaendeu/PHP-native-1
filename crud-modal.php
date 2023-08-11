<?php
$title = 'Daftar Akun';
include 'layout/header.php';

$data_akun = select("SELECT * FROM akun");

// Menampilkan data berdasarkan user login
$id_akun = $_SESSION['id_akun'];
$data_by_login = select("SELECT * FROM akun where id_akun = '$id_akun'");

// Menjalankan script jika tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (create_akun($_POST) > 0) {
    echo
    "<script>
      alert('Akun berhasil ditambahkan.');
      document.location.href = 'crud-modal.php';
    </script>";
  } else {
    echo
    "<script>
      alert('Akun gagal ditambahkan!');
      document.location.href = 'crud-modal.php';
    </script>";
  }
}

// Menjalankan script jika tombol tambah ditekan
if (isset($_POST['ubah'])) {
  if (update_akun($_POST) > 0) {
    echo
    "<script>
      alert('Akun berhasil diubah.');
      document.location.href = 'crud-modal.php';
    </script>";
  } else {
    echo
    "<script>
      alert('Akun gagal diubah!');
      document.location.href = 'crud-modal.php';
    </script>";
  }
}
?><!-- Content Wrapper. Contains page content -->
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
                  <!-- Button trigger modal -->
                  <?php if ($_SESSION['level'] == 1) : ?>
                    <button type="button" class="btn btn-sm btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                      <i class="fas fa-plus"></i> Tambah
                    </button>
                  <?php endif; ?>
                  <table class="table table-striped mt-2" id="table">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      <!-- Menampilkan seluruh data -->
                      <?php if ($_SESSION['level'] == 1) : ?>
                        <?php foreach ($data_akun as $akun) : ?>
                          <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td class="text-center"><?= $akun['nama']; ?></td>
                            <td class="text-center"><?= $akun['username']; ?></td>
                            <td class="text-center"><?= $akun['email']; ?></td>
                            <td class="text-center">
                              <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>">Ubah</button>
                              <button type=" button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>">Hapus</button>
                            </td>
                          </tr>
                          <?php $no++; ?>
                        <?php endforeach; ?>
                        <!-- Menampilkan data berdasarkan user login -->
                      <?php else : ?>
                        <?php foreach ($data_by_login as $akun) : ?>
                          <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td class="text-center"><?= $akun['nama']; ?></td>
                            <td class="text-center"><?= $akun['username']; ?></td>
                            <td class="text-center"><?= $akun['email']; ?></td>
                            <td class="text-center">
                              <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>">Ubah</button>
                            </td>
                          </tr>
                          <?php $no++; ?>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>

                  <!-- Modal Tambah -->
                  <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-white text-dark">
                          <h5 class="modal-title" id="modalTambahLabel">Tambah Akun</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post">
                            <div class="mb-3">
                              <label for="nama" class="form-label">Nama</label>
                              <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                              <label for="username" class="form-label">Nama Pengguna</label>
                              <input type="text" name="username" id="username" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" name="email" id="email" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Kata Sandi</label>
                              <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                              <label for="level" class="form-label">Level</label>
                              <select name="level" id="level" class="form-control" required>
                                <option value="null"></option>
                                <option value="1">Admin</option>
                                <option value="2">Operator Barang</option>
                                <option value="3">Operator Mahasiswa</option>
                              </select>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-dark" name="tambah" id="tambah">Tambah</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Ubah -->
                  <?php foreach ($data_akun as $akun) : ?>
                    <div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-white text-dark">
                            <h5 class="modal-title" id="modalUbahLabel">Ubah Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="post">
                              <input type="hidden" class="form-control" name="id_akun" id="id_akun" value="<?= $akun['id_akun']; ?>">
                              <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" required value="<?= $akun['nama']; ?>" placeholder="Masukkan nama">
                              </div>
                              <div class="mb-3">
                                <label for="username" class="form-label">Nama Pengguna</label>
                                <input type="text" name="username" id="username" class="form-control" autocomplete="off" required value="<?= $akun['username']; ?>" placeholder="Masukkan nama pengguna">
                              </div>
                              <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" autocomplete="off" required value="<?= $akun['email']; ?>" placeholder="Masukkan email">
                              </div>
                              <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="off" required placeholder="Masukkan kata sandi lama/baru">
                              </div>
                              <?php if ($_SESSION['level'] == 1) : ?>
                                <div class="mb-3">
                                  <label for="level" class="form-label">Level</label>
                                  <select name="level" id="level" class="form-control" required>
                                    <option value="null"></option>
                                    <?php $level = $akun['level'] ?>
                                    <option value="1" <?= $level == '1' ? 'selected' : ''; ?>>Admin</option>
                                    <option value="2" <?= $level == '2' ? 'selected' : ''; ?>>Operator Barang</option>
                                    <option value="3" <?= $level == '3' ? 'selected' : ''; ?>>Operator Mahasiswa</option>
                                  </select>
                                </div>
                              <?php else : ?>
                                <input type="hidden" name="" id="" class="form-control" value="<?= $akun['level']; ?>">
                              <?php endif; ?>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-dark" name="ubah" id="ubah">Ubah</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>

                  <!-- Modal Hapus -->
                  <?php foreach ($data_akun as $akun) : ?>
                    <div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="modalTambahLabel">Hapus Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda akan menghapus data <br> <?= $akun['nama']; ?>?</h5>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
                            <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-outline-dark">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
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