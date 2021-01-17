<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();?>admin/index">
        <div class="sidebar-brand-text mx-3">Admin Perpustakaan</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url();?>admin/index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Kelola Data
      </div>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-book"></i>
          <span>Data Buku</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url();?>admin/data_kategori_buku">Kategori Buku</a>
            <a class="collapse-item" href="<?= base_url();?>admin/data_buku">Daftar Buku</a>
          </div>
          </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Kelola Data
      </div>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pengunjung</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url();?>admin/data_pengunjung_datang">Pengunjung Datang</a>
            <a class="collapse-item" href="<?= base_url();?>admin/data_pengunjung_pulang">Pengunjung Pulang</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>admin/data_supervisor">
        <i class="fas fa-user-tie"></i>
          <span>Data Supervisor</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url();?>admin/data_admin">
        <i class="fas fa-user-tie"></i>
          <span>Data Admin</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>admin/data_kritik_saran">
        <i class="fas fa-envelope-open-text"></i>
          <span>Kritik dan Saran</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <img src="<?php echo base_url('assets/admin/img/logo-bps.png')?>" width="55" height="40">Perpustakaan BPS Kota Malang
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> &nbsp;&nbsp;
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, <?= $this->session->userdata('user');?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url();?>Admin/logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
  <!-- End of Page Wrapper -->

  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Data Buku Perpustakaan BPS Kota Malang</h6>
      </div>
      <div class="card-body">
        <?php foreach ($buku as $b) :?>
            <h5 class="card-title"><?=($b['judul_buku']);?></h5>
            <p class="card-text">
                <img src="<?= base_url('upload/buku/'.$b['cover'])?>" style="height: 210px; width: 150px;">
            </p>
            <p class="card-text">
                <label for="kategori"><b>Kategori :</b></label>
                <?=($b['nama_kategori']); ?>
            </p>
            <p class="card-text">
                <label for="isbn"><b>ISBN :</b></label>
                <?=($b['isbn']); ?>
            </p>
            <p class="card-text">
                <label for="nomor_katalog"><b>Nomor Katalog :</b></label>
                <?=($b['nomor_katalog']); ?>
            </p>
            <p class="card-text">
                <label for="tahun_rilis"><b>Tahun Rilis :</b></label>
                <?=($b['tahun_rilis']); ?>
            </p>
            <p class="card-text">
                <label for="letak"><b>Letak :</b></label>
                <?=($b['letak']); ?>
            </p>
            <p class="card-text">
                <label for="jumlah_halaman"><b>Jumlah Halaman :</b></label>
                <?=($b['jumlah_halaman']); ?>
            </p>
            <p class="card-text">
                <label for="status"><b>Status :</b></label>
                <?=($b['status']); ?>
            </p>
            <p class="card-text">
                <label for="deskripsi"><b>Deskripsi :</b></label>
                <?=($b['deskripsi']); ?>
            </p>
            <p class="card-text">
                <label for=""><b>File Buku :</b></label>
                <!-- <?=($b['file_buku']); ?> -->
                <a href="<?= base_url('upload/buku/'.$b["file_buku"])?>"><?=$b["file_buku"];?>
            </p>
            
                <!-- <a href src="<?= base_url('upload/buku/'.$b['file_buku'])?>" class="btn btn-primary btn-sm" Lihat Buku> -->
        <?php endforeach; ?>
    </div>
  </div>
</div>
</div>