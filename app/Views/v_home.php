<div class="col-lg-9">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('slider/gambar1.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Al Baqarah :43</h5>
                    <p>“Dan dirikanlah sholat, tunaikanlah zakat, dan rukuklah beserta orang yang rukuk.”</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('slider/gambar2.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Al Isra :78</h5>
                    <p>"Laksanakanlah salat sejak matahari tergelincir sampai gelapnya malam dan (laksanakan pula salat) Subuh. Sungguh, salat subuh itu disaksikan (oleh malaikat)."</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('slider/gambar3.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Al Baqarah :45</h5>
                    <p>"Dan mohonlah pertolongan (kepada Allah) dengan sabar dan salat. Dan (salat) itu sungguh berat, kecuali bagi orang-orang yang khusyuk,"</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <br>
</div>

<div class="col-lg-3">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title text-success"><b>Bengkulu</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-3">

            <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Subuh</a>
                        <span class="product-description">
                            04.32
                        </span>
                    </div>
                </li>

                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Dhuha</a>
                        <span class="product-description">
                            05.57
                        </span>
                    </div>
                </li>

                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Dzuhur</a>
                        <span class="product-description">
                            12.07
                        </span>
                    </div>
                </li>

                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Ashar</a>
                        <span class="product-description">
                            15.34
                        </span>
                    </div>
                </li>

                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Maghrib</a>
                        <span class="product-description">
                            18.18
                        </span>
                    </div>
                </li>

                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Isya</a>
                        <span class="product-description">
                            19.33
                        </span>
                    </div>
                </li>
            </ul>
            <div class="text-center">
                
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<?php
if ($kas_m == null) {
    $pemasukan_m[] = 0;
    $pengeluaran_m[] = 0;
} else {
    foreach ($kas_m as $key => $value) {
        $pemasukan_m[] = $value['kas_masuk'];
        $pengeluaran_m[] = $value['kas_keluar'];
    }
}
$saldo_m = array_sum($pemasukan_m) - array_sum($pengeluaran_m);

if ($kas_s == null) {
    $pemasukan_s[] = 0;
    $pengeluaran_s[] = 0;
} else {
    foreach ($kas_s as $key => $value) {
        $pemasukan_s[] = $value['kas_masuk'];
        $pengeluaran_s[] = $value['kas_keluar'];
    }
}
$saldo_s = array_sum($pemasukan_s) - array_sum($pengeluaran_s);

if ($kas_zm == null) {
    $pemasukan_zm[] = 0;
    $pengeluaran_zm[] = 0;
} else {
    foreach ($kas_zm as $key => $value) {
        $pemasukan_zm[] = $value['kas_masuk'];
        $pengeluaran_zm[] = $value['kas_keluar'];
    }
}
$saldo_zm = array_sum($pemasukan_zm) - array_sum($pengeluaran_zm);

if ($kas_zp == null) {
    $pemasukan_zp[] = 0;
    $pengeluaran_zp[] = 0;
} else {
    foreach ($kas_zp as $key => $value) {
        $pemasukan_zp[] = $value['kas_masuk'];
        $pengeluaran_zp[] = $value['kas_keluar'];
    }
}
$saldo_zp = array_sum($pemasukan_zp) - array_sum($pengeluaran_zp);
?>


<div class="col-lg-12">
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-bill-wave"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Saldo Kas Masjid</span>
                    <span class="info-box-number">
                        Rp. <?= number_format($saldo_m, 0) ?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding-heart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Saldo Zakat Fitrah</span>
                    <span class="info-box-number">
                        Rp. <?= number_format($saldo_s, 0) ?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding-heart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Saldo Zakat Mal</span>
                    <span class="info-box-number">
                        Rp. <?= number_format($saldo_zm, 0) ?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-6">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding-heart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Saldo Zakat Penghasilan</span>
                    <span class="info-box-number">
                        Rp. <?= number_format($saldo_zp, 0) ?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->


    </div>
</div>

<div class="col-lg-12">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('slider/gambar4.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('slider/gambar5.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('slider/gambar6.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
    </div>
    <br>
</div>