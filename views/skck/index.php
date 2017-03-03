<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\SkckSearch $searchModel
 */

$this->title = 'Skck';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a('<i class="fa fa-plus"></i> Tambah Baru', ['create'], ['class' => 'btn btn-success']) ?>
</p>


<?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

<div class="box box-info">
    <div class="box-body">
        <div class="table-responsive">
            <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager' => [
                    'class' => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'],
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class' => 'x'],
                'columns' => [

                    \app\components\ActionButton::getButtons(),
                    [
                        'class' => yii\grid\DataColumn::className(),
                        'contentOptions' => ['nowrap' => 'nowrap', 'style' => 'text-align:center'],
                        'attribute' => 'Tanggal Buat',
                        'value' => function ($model) {
                            return \app\components\Tanggal::indonesian_date(new \DateTime($model->tanggal_buat));
                        },
                        'format' => 'raw',
                    ],
                    'nik',
                    'nik_nama',
                    'nik_tempat_lahir',
                    [
                        'class' => yii\grid\DataColumn::className(),
                        'contentOptions' => ['nowrap' => 'nowrap', 'style' => 'text-align:center'],
                        'attribute' => 'Tanggal Lahir',
                        'value' => function ($model) {
                            return \app\components\Tanggal::indonesian_date(new \DateTime($model->nik_tanggal_lahir));
                        },
                        'format' => 'raw',
                    ],
                    'nik_jenis_kelamin',
                    'nik_pekerjaan',
                    /*'nik_status_perkawinan'*/
                    /*'nik_kewarganegaraan'*/
                    /*'nik_alamat:ntext'*/
                    /*'rt'*/
                    /*'rw'*/
                    /*'tanggal_buat'*/
                    /*'user'*/
                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'cetak',
                        'value' => function ($model) {
                            return $model->getCetak();
                        },
                        'contentOptions' => ['nowrap' => 'nowrap', 'style' => 'text-align:center'],
                        'format' => 'raw',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

<?php \yii\widgets\Pjax::end() ?>

