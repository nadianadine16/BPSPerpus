<head>
<title><?=$title?></title>
</head>
<section id="team" class="team section-bg">
  <div class="container">
    <div class="section-title">
      <h2 data-aos="fade-in">Daftar Buku</h2>
      <p data-aos="fade-in">Daftar Buku ini Tersedia Dalam Bentuk Softfile Ataupun Hardfile.</p>
    </div>
    <div class="row">
      <div class="col-md-5">
        <form action ="<?= base_url('user/cari');?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off">
            <div class="input-group-append">
              <input class="btn btn-primary" type="submit" name="submit"></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
    <?php foreach($dataBuku as $p):?>
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="member" data-aos="fade-up">
          <div class="pic"><img src="<?= base_url('upload/buku/'.$p["cover"])?>"  style="height: 300px; width: 200px;" alt=""></div>
          <h4><a href="<?= base_url();?>user/detail_buku/<?=$p['id_buku'];?>" style="color:#213B52"><?=$p["judul_buku"];?></a></h4>
          <span>ISBN : <?=$p["isbn"];?></span>
          <h6 style="color: #2c3852"><?=date('d-m-Y', strtotime($p["tahun_rilis"]));?></h6>
          
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section><!-- End Team Section -->