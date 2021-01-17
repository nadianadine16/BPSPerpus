<section id="about" class="about section-bg">
      <div class="container">
        <div class="row">
        <?php foreach($dataBuku as $p):?>
          <div class="pic"><img src="<?= base_url('upload/buku/'.$p["cover"])?>"  style="height: 400px; width: 300px;" alt=""></div>
          <div class="col-xl-7 pl-0 pl-lg-5 pr-lg-1 d-flex align-items-stretch">
            <div class="content d-flex flex-column justify-content-center">
              <h3 data-aos="fade-in" data-aos-delay="100"><?=$p["judul_buku"];?></h3>
              <p data-aos="fade-in">
              <?=$p["deskripsi"];?>
              </p><br>
              <p data-aos="fade-in">
                <b style="color:#213B52">Kategori <?=$p["nama_kategori"];?></b>
              </p>
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up">
                  <i class="bx bx-receipt"></i>
                  <h4><a href="#">ISBN</a></h4>
                  <p><?=$p["isbn"];?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                  <h4><a href="#">Nomor Katalog</a></h4>
                  <p><?=$p["nomor_katalog"];?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-receipt"></i>
                  <h4><a href="#">Tahun Rilis</a></h4>
                  <p><?=$p["tahun_rilis"];?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-receipt"></i>
                  <h4><a href="#">Letak</a></h4>
                  <p><?=$p["letak"];?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-receipt"></i>
                  <h4><a href="#">Jumlah Halaman</a></h4>
                  <p><?=$p["jumlah_halaman"];?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-receipt"></i>
                  <h4><a href="#">Status</a></h4>
                  <p><?=$p["status"];?></p>
                </div>
                <p class="card-text">
                <label for=""><b>File Buku :</b></label>
                <!-- <?=($p['file_buku']); ?> -->
                <a href="<?= base_url('upload/buku/'.$p["file_buku"])?>"><?=$p["file_buku"];?>
            </p>
              </div>
            </div><!-- End .content-->
          </div>
          <?php endforeach;?>
        </div>
      </div>
    </section><!-- End About Section -->