<?php
  // session_start();
  $role_id = 0;
  $role_name = "Publik";

  if(isset($_SESSION["SESS_HARPAN_ROLE_ID"])) {
    $role_id = $_SESSION["SESS_HARPAN_ROLE_ID"];
    $role_name = $_SESSION["SESS_HARPAN_ROLE"];
  }

  $className = "sidebar-dark-primary";

  if($role_id == 0) {
    $className = "pastel-sidebar";
  }
?>

  <style>
    .pastel-sidebar {
      background: lightblue;
      color: black !important;
    }
  </style>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar <?= $className ?> elevation-4">
    <?php if($role_id != 0): ?>
      <!-- Brand Logo -->
      <!-- <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DKP3 BANJARMASIN</span>
      </a> -->
    <?php endif; ?>

    <!-- Sidebar -->
    <div class="sidebar">
      <?php if($role_id != 0): ?>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/logo.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= "DKP3 KOTA BANJARMASIN" ?></a>
          </div>
        </div>
      <?php endif; ?>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if($role_id == 0): ?>
            <!-- <li class="nav-item">
              <a href="?page=harga-publik" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-home nav-icon"></i>
                <p>
                  Dashboard
                  <!-- <i class="fas fa-angle-left right"></i> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=harga-eceran-publik" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Harga Eceran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=harga-grosir-publik" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Harga Grosir</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=harga-nasional-publik" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Harga Nasional</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="?page=stok-publik" class="nav-link">
                <i class="nav-icon fas fa-box"></i>
                <p>
                  Data Ketersediaan
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=agenda-publik" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Agenda Pasar Murah
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=kontak-kami" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Kontak Kami
                </p>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-power-off nav-icon"></i>
                <p>
                  Login
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=login-administrator" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Login Administrator</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=login-pimpinan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Login Pimpinan</p>
                  </a>
                </li>
              </ul>
            </li> -->
            <li class="nav-item">
              <a href="?page=login" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Login
                </p>
              </a>
            </li>
          <?php endif; ?>

          <?php if($role_id != 0): ?>
            <li class="nav-item">
              <a href="?page=dashboard" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-header">MASTER DATA HARGA</li>
            <li class="nav-item">
              <a href="?page=eceran" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Harga Eceran
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=grosir" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Harga Grosir
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=nasional" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Harga Nasional
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=distributor" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Harga Distributor
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=produsen" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Harga Produsen
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

            <li class="nav-header">MASTER DATA</li>
            <li class="nav-item">
              <a href="?page=komoditas" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Komoditas
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=stok" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Ketersediaan
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=permintaan" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Permintaan
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=inflasi" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Inflasi
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

            <?php if($role_id != 0): ?>
              <li class="nav-item">
                <a href="?page=kritik-saran" class="nav-link">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>
                    Kritik Saran
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=admin-agenda" class="nav-link">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>
                    Agenda Pasar Murah
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
            <?php endif; ?>

            <?php if($role_id == 1): ?>
              <li class="nav-item">
                <a href="?page=aktifasi" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    AKTIFASI USER
                    <?php if($notifikasi_register > 0): ?>
                      <span class="right badge badge-danger"><?= $notifikasi_register ?></span>
                    <?php endif; ?>
                  </p>
                </a>
              </li>
            <?php endif; ?>

            <?php if($role_id != 0): ?>
              <!-- <li class="nav-header">BAGIAN PIMPINAN</li>
              <li class="nav-item">
                <a href="?page=dashboard" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Verifikasi Data
                  </p>
                </a>
              </li> -->

              <li class="nav-header">LAPORAN</li>
              <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-print nav-icon"></i>
                <p>
                  SEMUA LAPORAN
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=laporan-harga-eceran&type=laporan" class="nav-link" target="_blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Harga Eceran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-harga-grosir&type=laporan" class="nav-link" target="_blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Harga Grosir</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-harga-nasional&type=laporan" class="nav-link" target="_blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Harga Nasional</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-harga-distributor&type=laporan" class="nav-link" target="_blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Harga Distributor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-harga-produsen&type=laporan" class="nav-link" target="_blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Harga Produsen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-stok&type=laporan" class="nav-link" target="_blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Stok</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-permintaan&type=laporan" class="nav-link" target="_blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Permintaan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-inflasi&type=laporan" class="nav-link" target="_blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Inflasi</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>

            <li class="nav-header">LAINNYA</li>
            <li class="nav-item">
              <a href="?page=logout" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Keluar
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
          <?php endif; ?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper <?= ($role_id == 0) ? "bg-aku" : "" ?>">