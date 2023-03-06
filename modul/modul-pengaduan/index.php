<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
    @header('location:../modul-auth/index.php');
} else {
    if ($_SESSION['level'] == 'masyarakat') {
        $nik = $_SESSION['nik'];
    }
}
// CRUD
if (isset($_POST['tambahPengaduan'])) {
    $isi_laporan = $_POST['isi_laporan'];
    $tgl = $_POST['tgl_pengaduan'];
    //upload
    $ekstensi_diperbolehkan = array('jpg', 'png');
    $foto = $_FILES['foto']['name'];
    $x = explode(".", $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    if (!empty($foto)) {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '$foto', '0')";
            $r = mysqli_query($con, $q);
            if ($r) {
                move_uploaded_file($file_tmp, '../../assets/images/masyarakat/' . $foto);
            }
        }
    } else {
        $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '', '0')";
        $r = mysqli_query($con, $q);
    }
}

// hapus pengaduan
if (isset($_POST['hapus'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    if ($id_pengaduan != '') {
        $q = "SELECT `foto` FROM `pengaduan` WHERE id_pengaduan = $id_pengaduan";
        $r = mysqli_query($con, $q);
        $d = mysqli_fetch_object($r);
        unlink('../../assets/images/masyarakat/' . $d->foto);
    }
    $q = "DELETE FROM `pengaduan` WHERE id_pengaduan = $id_pengaduan";
    $r = mysqli_query($con, $q);
}

// rubah status pengaduan
if (isset($_POST['proses_pengaduan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $status = $_POST['status'];
    $q = "UPDATE `pengaduan` SET status = '$status' WHERE id_pengaduan = '$id_pengaduan'";
    $r = mysqli_query($con, $q);
}
?>
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

            <!-- main panel -->
            <div class="main-panel">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pengaduan Masyarakat</h4>

                            <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                                <div class="card">
                                    <div class="card-header">
                                        <button data-toggle="modal" data-target="#modal-lg" class="btn btn-success">buat pengaduan&nbsp;<i class="fa fa-pen"></i></button>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- modal -->
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Buat Pengaduan
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <input hidden name="nik" value="">
                                                <div class="form-group">
                                                    <label for="isi_laporan">Isi Laporan</label>
                                                    <textarea name="isi_laporan" class="form-control" cols="30" rows="10"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                                                    <input type="date" name="tgl_pengaduan" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto">Foto</label>
                                                    <input type="file" name="foto" class="form-control">
                                                </div>
                                                <input type="submit" name="tambahPengaduan" value="simpan" class="btn btn-success">
                                            </form>
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>
                            </div>
                            <!-- end modal -->

                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTablesNya">
                                <thead>
										<tr>
											<th>NO</th>
											<th>Tanggal</th>
											<th>NIK</th>
											<th>Isi Laporan</th>
											<th>Foto</th>
											<th>Status</th>
											<?php if ($_SESSION['level'] == 'masyarakat') { ?>

												<th>Hapus</th>
											<?php } ?>
											<?php if ($_SESSION['level'] == 'petugas') { ?>

												<th>Proses Pengaduan</th>
											<?php } ?>

										</tr>
									</thead>
									<tbody>
										<?php
										if ($_SESSION['level'] == 'masyarakat') {
											$q = "SELECT * FROM `pengaduan` WHERE `nik` = $nik";
										} else {
											$q = "SELECT * FROM `pengaduan`";
										}
										$r = mysqli_query($con, $q);
										$no = 1;
										while ($d = mysqli_fetch_object($r)) {
										?>
											<tr>
												<td>
													<?= $no ?>
												</td>
												<td>
													<?= $d->tgl_pengaduan ?>
												</td>
												<td>
													<?= $d->nik ?>
												</td>
												<td>
													<?= $d->isi_laporan ?>
												</td>
												<td>
													<?php if ($d->foto == '') {
														echo '<img style="max-height:100px" class="img img-thumbnail" src="../../assets/images/no-foto.png">';
													} else {
														echo '<img style="max-height:100px" class="img img-thumbnail" src="../../assets/images/masyarakat/' . $d->foto . '">';
													} ?>
												</td>
												<td>
													<?= $d->status ?>
												</td>
												<?php if ($_SESSION['level'] == 'masyarakat') { ?>

													<td>
														<form action="" method="post"><input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>"><button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
													</td>
												<?php } ?>
												<?php if ($_SESSION['level'] == 'petugas') { ?>

													<td>
														<form action="" method="post">
															<input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>">
															<select class="form-control" name="status">
																<option value="0"> 0 </option>
																<option value="proses"> proses </option>
																<option value="selesai"> selesai </option>
															</select><br>
															<button type="submit" name="proses_pengaduan" class="btn btn-success form-control">ubah</button>
														</form>
													</td>
												<?php } ?>

											</tr>
										<?php $no++;
										} ?>
									</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


    <?php include('../../assets/footer.php') ?>

</body>

</html>