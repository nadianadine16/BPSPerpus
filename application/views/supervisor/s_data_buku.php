<div id="wrapper">
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();?>User/dashboard_supervisor">
        <div class="sidebar-brand-text mx-3">Supervisor Perpustakaan</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url();?>User/dashboard_supervisor">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Kelola Data
      </div>
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pengunjung</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url();?>Pengunjung/s_data_pengunjung_datang">Pengunjung Datang</a>
            <a class="collapse-item" href="<?= base_url();?>Pengunjung/s_data_pengunjung_pulang">Pengunjung Pulang</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url();?>Buku/s_data_buku">
        <i class="fas fa-user-tie"></i>
          <span>Data Buku</span></a>
      </li>
    </ul>
        </nav>
        <!-- End of Topbar -->
  <!-- End of Page Wrapper -->

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
                <a class="dropdown-item" href="<?= base_url();?>User/logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>

  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Data Buku Perpustakaan BPS Kota Malang</h6>
    </div>
  
  <div class="card-body">
  <a href="<?= base_url()?>/Buku/s_tambah_data_buku" class="btn btn-primary btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Data Buku</span>
    </a><br><br>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr align="center">
            <th>No</th>
            <th>No Katalog</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Tahun Rilis</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>             
        <?php $no=1; foreach($buku as $b):?>
          <tr>
            <td><?=$no++?></td>
            <td><?=$b["nomor_katalog"];?></td>
            <td><?=$b["nama_kategori"];?></td>
            <td><?=$b["judul_buku"]?></td>
            <td><?=$b["tahun_rilis"];?></td>
            <td><?=$b["status"];?></td>
            <td style="width:130px;">
            <a href="<?= base_url();?>Buku/s_detail_buku/<?=$b['id_buku'];?>" class="btn btn-primary btn-sm"><i class="fas fa-eye fa-xs" aria-hidden="true"></i></a>
            <a href="<?= base_url();?>Buku/s_edit_data_buku/<?=$b['id_buku'];?>" class="btn btn-success btn-sm"><i class="fas fa-edit fa-xs" aria-hidden="true"></i></a>
            <a href="<?=base_url();?>Buku/s_hapus_data_buku/<?=$b['id_buku'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs" aria-hidden="true"></i></a></td>
          </tr>
          <?php endforeach;?>          
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>