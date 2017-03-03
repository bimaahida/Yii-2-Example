<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\TamuSearch $searchModel
 */

$this->title = 'Tamu';
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
                        'attribute' => 'Tanggal',
                        'value' => function ($model) {
                            return \app\components\Tanggal::indonesian_date(new \DateTime($model->tanggal));
                        },
                        'format' => 'raw',
                    ],
                    'nik_tamu',
                    'nama_tamu',
                    // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
                    'keperluan:ntext',
                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'cetak',
                        'value' => function ($model) {
                            return $model->getCetak();
                        },
                        'contentOptions' => ['nowrap' => 'nowrap', 'style' => 'text-align:center'],
                        'format' => 'raw',
                    ],
                    // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
                ],
            ]); ?>
        </div>
    </div>
</div>

<?php \yii\widgets\Pjax::end() ?>

