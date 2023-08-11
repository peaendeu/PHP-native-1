<?php
$title = 'Kirim Email';
include 'layout/header.php';

// Mengecek apakah tombol kirim ditekan
use PHPMailer\PHPMailer\PHPMailer;
//Load Composer's autoloader
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
//Server settings
$mail->SMTPDebug  = 2;
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'user@gmail.com';
$mail->Password   = 'secret';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

//Recipients
require 'vendor/autoload.php';
if (isset($_POST['kirim'])) {
  if (create_barang($_POST) > 0) {
    echo
    "<script>
      alert('Email berhasil dikirim.');
      document.location.href = 'index.php';
    </script>";
  } else {
    echo
    "<script>
      alert('Email gagal dikirim!');
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
          <h1 class="m-0">Kirim Email</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Kirim Email</li>
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
          <label for="email penerima" class="form-label">Email Penerima</label>
          <input type="email" class="form-control" id="email penerima" name="email penerima" autocomplete="off" autofocus required>
        </div>
        <div class="mb-3">
          <label for="subjek" class="form-label">Subjek</label>
          <input type="text" class="form-control" id="subjek" name="subjek" autocomplete="off" required>
        </div>
        <div class="mb-3">
          <label for="pesan" class="form-label">Pesan</label>
          <textarea class="form-control" name="pesan" id="pesan" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark" id="kirim" name="kirim">Kirim</button>
      </form>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->
<?php include 'layout/footer.php' ?>