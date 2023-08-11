<?php
$title = 'Daftar Pegawai';
include 'layout/header.php';

if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3) {
  echo
  "<script>
    alert('Anda tidak punya akses.')
    document.location.href = 'crud-modal.php'
  </script>";
  exit;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Pegawai</li>
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
            <div class="container mt-2 ">
              <div class="row justify-content-center">
                <table class="table table-striped mt-2" id="table">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Jabatan</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Telepon</th>
                      <th class="text-center">Alamat</th>
                    </tr>
                  </thead>
                  <tbody id="live_data">
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </div>
      </section>
      <!-- /.content -->
    </div>
  </section>
</div>
<!-- /.content-wrapper -->

<script>
  $('document').ready(function() {
    setInterval(() => {
      getPegawai()
    }, 5000);
  })

  function getPegawai() {
    $.ajax({
      url: 'realtime-pegawai.php',
      type: 'GET',
      success: function(response) {
        $('#live_data').html(response)
      }
    })
  }
</script>

<?php include 'layout/footer.php'; ?>