<div class="right_col" role="main">
  <!-- top tiles -->
<!--   <div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
      <div class="count">2500</div>
      <span class="count_bottom"><i class="green">4% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
      <div class="count">123.50</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
      <div class="count green">2,500</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
      <div class="count">4,567</div>
      <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
      <div class="count">2,315</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
      <div class="count">7,325</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
  </div> -->
  <!-- /top tiles -->

<!--   <ol class="breadcrumb">
  <li><i class="fa fa-dashboard"><a href="<?php echo base_url('index.php/home/index'); ?>"> Home</a></i></li>
  <li class="active">Data</li>
  </ol> -->

<!-- <ol class="breadcrumb">
  <h3>Halaman Beranda</h3>
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol> -->


<div class="page-header" >
  <h1>Selamat Datang <small><?php echo $this->session->userdata('user_nama'); ?></small></h1>

  <div class="row">
    <div class="col-lg-4 col-xs-6">
      <div class="small-box bg-blue-sky">
        <div class="inner">
          <h3><?php echo $total; ?></h3>

          <p>Jumlah Buku</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <a href="<?php echo base_url('index.php/home/buku') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $total_p; ?></h3>

          <p>Jumlah Penjualan</p>
        </div>
        <div class="icon">
          <i class="fa fa-shopping-cart"></i>
        </div>
        <a href="<?php echo base_url('index.php/home/penjualan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-xs-6">
      <div class="small-box bg-orange">
        <div class="inner">
          <h3><?php echo $total; ?></h3>

          <p>Jumlah Retur</p>
        </div>
        <div class="icon">
          <i class="fa fa-mail-reply-all"></i>
        </div>
        <a href="<?php echo base_url('index.php/home/retur') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
</div>

  



  </div>
  <br />
  <!-- grafik -->

</div>