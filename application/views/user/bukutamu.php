<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$title?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url()?>/assetsBukuTamu/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/css/main.css">
<!--===============================================================================================-->
	<!--  -->
</head>

<!-- ======= Header ======= -->
<header id="header">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto" style="display:inline;">
        <a href="<?= base_url();?>User/index"><img src="<?php echo base_url('assets/admin/img/logo-bps.png')?>" width="55" height="40">&nbsp;&nbsp;<b>Perpustakaan BPS Kota Malang</b></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="<?= base_url();?>User/index">Home</a></li>
          <li class="active"><a href="<?= base_url();?>User/bukuTamu">Isi Buku Tamu</a></li>
          <li><a href="<?= base_url();?>User/buku">Buku</a></li>
          <li><a href="<?= base_url();?>User/contactus">Contact Us</a></li>
          <li class="get-started"><a href="<?= base_url();?>User/login_user">LOGIN</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

<body>
	<div class="bg-contact3" style="background-image: url('<?= base_url()?>/assetsBukuTamu/images/bg-01.jpg');">
		<div class="container-contact3">
			<div class="wrap-contact3"style="background:#213B52; width:1000px">
			<form action="<?=base_url('User/tambah_pengunjung')?>" method="POST" >
				<span class="contact3-form-title">
					- Buku Tamu -
				</span>
				<div class="alert alert-info" role="alert">
                  <?php
                    if(isset($pesan)) {
                      echo $pesan;
                    }
                    else {
                      echo "Masukkan Data dengan benar";
                    }
                  ?>
                </div>
                <div class="wrap-input3 validate-input" data-validate="Name is required">
					<input class="input3" type="text" name="nama_pengunjung" placeholder="Nama Anda">
					<span class="focus-input3"></span>
				</div>
				<div class="drop-down">
				<div>
					<select class="selection-2" id="jenis_kelamin" name="jenis_kelamin">
					<option value="0">- Jenis Kelamin -</option>
					<?php foreach($jenis_kelamin as $t) : ?>
                        <option value="<?=($t)?>"><?=($t)?></option>
                    <?php endforeach;?>
                	</select>
				</div>
				<span class="focus-input3"></span>
				</div>
				<div class="wrap-input3 validate-input" data-validate = "Alamat harus diisi">
					<input class="input3" type="text" name="alamat" placeholder="Alamat/Asal Instansi">
					<span class="focus-input3"></span>
				</div>
                <div class="wrap-input3 validate-input" data-validate = "Telepon harus diisi">
					<input class="input3" type="text" name="telepon" placeholder="Telepon Anda">
					<span class="focus-input3"></span>
				</div>
				<div class="wrap-input3 validate-input" data-validate = "Isi email dengan forma: ex@gmail.com">
					<input class="input3" type="text" name="email" placeholder="Email Anda">
					<span class="focus-input3"></span>
				</div>
				<div class="drop-down">
				<div>
					<select class="selection-2" name="pekerjaan">
					<option value="0">- Pilih Pekerjaan -</option>
					<option>PNS</option>
					<option>Karyawan BUMN/Swasta</option>
					<option>Mahasiswa</option>
                    <option>Lainnya</option>
					</select>
				</div>
					<span class="focus-input3"></span>
				</div>
				<div class="drop-down">
					<div>
					<select id="id_buku" name="id_buku" style="width:540px;">
					<option value="0"> - Buku yang Dicari - </option>
					<?php foreach($judulBuku as $d) : ?>
						<option value="<?=$d["id_buku"];?>"><?=$d["judul_buku"];?></option>
					<?php endforeach;?>
					</select></div>
					<span class="focus-input3"></span>
				</div>
				<input class="input3" type="hidden" name="status" value="1">
				<div class="container-contact3-form-btn">
					<center><button class="contact3-form-btn" name="submit">
					Submit
					</button>
				</div>
				</form>
				
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
	<script src="<?= base_url()?>/assetsBukuTamu/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>/assetsBukuTamu/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url()?>/assetsBukuTamu/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>/assetsBukuTamu/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>/assetsBukuTamu/js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script type="text/javascript">
 $(document).ready(function() {
     $('#id_buku').select2();
 });
</script>
</body>
</html>