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
      <li class="nav-item">
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
      <li class="nav-item ">
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
        <h6 class="m-0 font-weight-bold text-primary">Daftar Data Pengunjung Pulang Perpustakaan BPS Kota Malang</h6>
    </div>
  
  <div class="card-body">
  <a href="<?= base_url()?>Admin/form_export" class="btn btn-success btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-download"></i>
      </span>
      <span class="text">Cetak Data Pengunjung</span>
    </a><br><br>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Pekerjaan</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Buku yang Dicari</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>             
        <?php $no=1; foreach($pengunjung as $p):?>
          <tr>
            <td><?=$no++?></td>
            <td><?=$p["nama_pengunjung"];?></td>
            <td><?=$p["jenis_kelamin"];?></td>
            <td><?=$p["alamat"]?></td>
            <td><?=$p["telepon"];?></td>
            <td><?=$p["pekerjaan"];?></td>
            <td><?=$p["tanggal"];?></td>
            <td><?=$p["jam_masuk"];?></td>
            <td><?=$p["jam_keluar"];?></td>
            <td><?=$p["judul_buku"];?></td>
            <td>
            <a href="<?=base_url();?>admin/hapus_data_pengunjung/<?=$p['id_pengunjung'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          </tr>
          <?php endforeach;?>          
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>