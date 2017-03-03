<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php
/* @var $this yii\web\View */

use app\components\Angka;
use miloschuman\highcharts\Highcharts;

$this->title = 'Dashboard';
?>
<?php
$jumIuran = 0;
foreach (\app\models\Iuran::find()->all() as $jm1) {
    $jumIuran += $jm1->nominal;
}
?>
<?php
$jmlPengeluaran = 0;
foreach (\app\models\Pengeluaran::find()->all() as $jm2) {
    $jmlPengeluaran += $jm2->nominal;
}
?>
<?php
$jmlPenduduk = app\models\Penduduk::find()->count();
?>
<?php
$saldo = ($jumIuran - $jmlPengeluaran);
?>

<div class="site-index">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo 'Rp ' . Angka::toReadableAngka($saldo, false) ?></h3>

                    <p>Total Saldo</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <?php if(Yii::$app->user->identity->id == 1 ) { ?><a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a><?php } else {}?>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">

                    <h3><?php echo 'Rp ' . Angka::toReadableAngka($jumIuran, false) ?></h3>

                    <p>Total Iuran</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd-outline"></i>
                </div>
                <?php if(Yii::$app->user->identity->id == 1 ) { ?><a href="<?php echo Yii::$app->request->baseUrl . '/iuran' ?>" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a> <?php } else {}?>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo 'Rp ' . Angka::toReadableAngka($jmlPengeluaran, false) ?></h3>

                    <p>Total Pengeluaran</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart-outline"></i>
                </div>
                <?php if(Yii::$app->user->identity->id == 1 ) { ?>  <a href="<?php echo Yii::$app->request->baseUrl . '/pengeluaran' ?>" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i></a><?php } else {}?>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo Angka::toReadableAngka($jmlPenduduk, false); ?></h3>

                    <p>Total Penduduk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <?php if(Yii::$app->user->identity->id == 1 ) { ?>  <a href="<?php echo Yii::$app->request->baseUrl . '/penduduk' ?>" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a><?php } else {}?>
            </div>
        </div>
        <!-- ./col -->

    </div>
    </div>

