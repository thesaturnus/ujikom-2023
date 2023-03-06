<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="user-profile">
    <div class="user-image">
      <img src="../../assets/images/faces/face28.png">
    </div>
    <div class="user-name">
      <?php
      if ($_SESSION['level'] == 'masyarakat') {
        echo ($_SESSION['nama']);
      } elseif ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') {
        echo ($_SESSION['nama_petugas']);
      }
      ?>
    </div>
    <div class="user-designation">
      <?= $_SESSION['level'] ?>
    </div>
  </div>
  <ul class="nav">

    <?php if ($_SESSION['level'] == 'masyarakat') { ?>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-profile">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-pengaduan">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Pengaduan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-tanggapan">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Tanggapan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-auth/logout.php">
          <i class="icon-book menu-icon"></i>
          <span class="menu-title">Log Out</span>
        </a>
      </li>
    <?php } ?>

    <?php if ($_SESSION['level'] == 'admin') { ?>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-profile">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-pengaduan">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Pengaduan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-tanggapan">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Tanggapan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-masyarakat">
          <i class="icon-command menu-icon"></i>
          <span class="menu-title">Masyarakat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-petugas">
          <i class="icon-help menu-icon"></i>
          <span class="menu-title">Petugas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-auth/logout.php">
          <i class="icon-book menu-icon"></i>
          <span class="menu-title">Log Out</span>
        </a>
      </li>
    <?php } ?>


    <?php if ($_SESSION['level'] == 'petugas') { ?>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-profile">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-pengaduan">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Pengaduan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-tanggapan">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Tanggapan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_pela/UKK-2023/modul/modul-auth/logout.php">
          <i class="icon-book menu-icon"></i>
          <span class="menu-title">Log Out</span>
        </a>
      </li>
    <?php } ?>






  </ul>
</nav>