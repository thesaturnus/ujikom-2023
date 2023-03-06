<!DOCTYPE html>
<html lang="en">

<?php include('../../assets/header.php') ?>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">



        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- Sidebar -->
      <?php include('../../assets/sidebar.php') ?>

      <!-- end Sidebar -->
      <!-- Main profile -->
      <?php if ($_SESSION['level'] == 'masyarakat') { ?>
        <!-- main panel -->
        <div class="main-panel">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Data Diri Masyarakat</h4>
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">NIK</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="NIK" value="<?= $_SESSION['nik'] ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="nama lengkap" value="<?= $_SESSION['nama'] ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword4" placeholder="username" value="<?= $_SESSION['username'] ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">No Telp</label>
                    <input type="text" class="form-control" id="exampleInputPassword4" placeholder="telp" value="<?= $_SESSION['telp'] ?>" disabled>
                  </div>


                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      <?php } ?>

      <?php if ($_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'admin') { ?>
        <!-- main panel -->
        <div class="main-panel">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Data Diri Petugas</h4>
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">NIK</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="id_petugas" value="<?= $_SESSION['id_petugas'] ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="nama lengkap" value="<?= $_SESSION['nama_petugas'] ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword4" placeholder="username" value="<?= $_SESSION['username'] ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">No Telp</label>
                    <input type="text" class="form-control" id="exampleInputPassword4" placeholder="telp" value="<?= $_SESSION['telp'] ?>" disabled>
                  </div>


                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      <?php } ?>
      <!-- end profile -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  <?php include('../../assets/footer.php') ?>

</body>

</html>