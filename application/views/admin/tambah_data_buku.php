<div id="wrapper">
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();?>User/dashboard_admin">
        <div class="sidebar-brand-text mx-3">Admin Perpustakaan</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>User/dashboard_admin">
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
            <a class="collapse-item" href="<?= base_url();?>Kategori_buku/index">Kategori Buku</a>
            <a class="collapse-item" href="<?= base_url();?>Buku/index">Daftar Buku</a>
          </div>
          </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>Pengunjung/data_pengunjung_pulang">
        <i class="fas fa-user-tie"></i>
          <span>Data Pengunjung</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>User/data_supervisor">
        <i class="fas fa-user-tie"></i>
          <span>Data Supervisor</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url();?>User/data_admin">
        <i class="fas fa-user-tie"></i>
          <span>Data Admin</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>Kritik_saran/index">
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
                <a class="dropdown-item" href="<?= base_url();?>User/logout">
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
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Buku Perpustakaan BPS Kota Malang</h6>
        </div>
        <div class="card-body">
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>

            <form action="<?=base_url('Buku/tambah_data_buku')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku">
                </div>
                <div class="form-group">
                    <label for="nomor_katalog">Nomor Katalog</label>
                        <input type="text" class="form-control" id="nomor_katalog" name="nomor_katalog">
                </div>
                <div class="form-group">
                    <label for="id_kategori">Kategori Buku</label>
                    <select class="form-control" id="id_kategori" name="id_kategori">
                        <?php foreach($kategori as $kb) : ?>
                            <option value="<?=$kb["id_kategori"];?>"><?=$kb["nama_kategori"];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn">
                </div>
                <div class="form-group">
                    <label for="tahun_rilis">Tahun Rilis</label>
                        <input type="date" class="form-control" id="tahun_rilis" name="tahun_rilis">
                </div>
                <div class="form-group">
                    <label for="jumlah_halaman">Jumlah Halaman</label>
                        <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman">
                </div>
                <div class="form-group">
                    <label for="letak">Letak</label>
                        <input type="text" class="form-control" id="letak" name="letak">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                </div>
                <div class="form-group">
                    <label for="cover">Upload Cover Buku</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                    <p>Format .jpg, .png Max Size : 500KB</p>
                </div>
                <!-- <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <?php foreach($status as $s) : ?>
                            <option value="<?=($s)?>" selected><?=($s)?></option>
                        <?php endforeach;?>
                    </select>
                </div>   -->

                <div class="form-group">
                    <label for="status">Status</label><br>
                    <?php foreach($status as $s) : ?>
                      <input type="radio" class="form-control1" id="status" name="status" value="<?=($s)?>"><?=($s)?>
                    <?php endforeach;?>
                </div>  

                <div id="formz">
                    <label for="file_buku">Upload Soft File Buku</label>
                    <input type="file" class="form-control" id="file_buku" name="file_buku">
                    <p>Format .pdf</p>
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>      
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  
<script type="text/javascript">
$(document).ready(function(){
  $("#formz").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
  $(".form-control1").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
    if ($("input[name='status']:checked").val() == "Tersedia Softcopy" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
      $("#formz").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
      } 
    else {
      $("#formz").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
    }
  });
});
</script>