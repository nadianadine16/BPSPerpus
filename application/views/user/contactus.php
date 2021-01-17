<head>
<title><?=$title?></title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
</head>
<!-- ======= Contact Section ======= -->
<body>
<section id="contact" class="contact section-bg">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-in">Contact</h2>
      <p data-aos="fade-in">Perpustakaan BPS Kota Malang Menyajikan Berbagai Pilihan Buku Berupa Hard Copy dan Soft Copy</p>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="info-box" data-aos="fade-up">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p>Jl. Janti Bar. No.47, Bandungrejosari, Kec. Sukun, Kota Malang, Jawa Timur 65148</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>bps3573@bps.go.id</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>(0341) 801164</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mt-4 mt-lg-0">
        <form action="<?=base_url('user/prosesKritik')?>" method="POST">
          <!-- <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div> -->
          <!-- <div class="dropdown"> -->
          <div class="drop-down">
					<div>
          <select id="id_pengunjung" name="id_pengunjung" style="width:540px;">
          <?php foreach($pengunjung as $d) : ?>
            <option value="<?=$d["id_pengunjung"];?>"><?=$d["email"];?></option>
          <?php endforeach;?>
          </select><br><br></div>
          <span class="focus-input3"></span>
          </div>
          <!-- </div> -->
          <div class="form-group">
            <textarea class="form-control" name="KritikSaran" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Kritik & Saran"></textarea>
            <div class="validate"></div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
        <br>
                <div class="alert alert-info" role="alert">
                  <?php
                    if(isset($pesan)) {
                      echo $pesan;
                    }
                    else {
                      echo "Masukkan Email";
                    }
                  ?>
                </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
 $(document).ready(function() {
     $('#id_pengunjung').select2();
 });
</script>
</section><!-- End Contact Section -->

