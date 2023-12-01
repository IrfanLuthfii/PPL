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



<div class="col-lg-6 col-12">
    <!-- small box -->
    <div class="small-box bg-primary">
        <div class="inner">
            <h4>Saldo Kas Masjid</h4>
            <h3>Rp. <?= number_format($saldo_m, 0) ?>,-</h3>
        </div>
        <div class="icon">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <a href="<?= base_url('KasMasjid') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-6 col-12">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h4>Saldo Kas Zakat fitrah</h4>
            <h3>Rp. <?= number_format($saldo_s, 0) ?>,-</h3>
        </div>
        <div class="icon">
            <i class="fas fa-hand-holding-heart"></i>
        </div>
        <a href="<?= base_url('KasSosial') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-6 col-12">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h4>Saldo Kas Zakat Mal</h4>
            <h3>Rp. <?= number_format($saldo_zm, 0) ?>,-</h3>
        </div>
        <div class="icon">
            <i class="fas fa-hand-holding-heart"></i>
        </div>
        <a href="<?= base_url('KasMal') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-6 col-12">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h4>Saldo Kas Zakat Penghasilan</h4>
            <h3>Rp. <?= number_format($saldo_zp, 0) ?>,-</h3>
        </div>
        <div class="icon">
            <i class="fas fa-hand-holding-heart"></i>
        </div>
        <a href="<?= base_url('KasPenghasilan') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>