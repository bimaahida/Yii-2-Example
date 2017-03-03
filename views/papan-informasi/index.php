<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\PapanInformasiSearch $searchModel
*/

$this->title = 'Papan Informasi';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

<div class="box box-info">
    <div class="box-body">
        <div class="table-responsive">
            <?= GridView::widget([
            'layout' => '{summary}{pager}{items}{pager}',
            'dataProvider' => $dataProvider,
            'pager'        => [
                'class'          => yii\widgets\LinkPager::className(),
                'firstPageLabel' => 'First',
                'lastPageLabel'  => 'Last'            ],
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
            'headerRowOptions' => ['class'=>'x'],
            'columns' => [

            \app\components\ActionButton::getButtons(),

			'gambar',
			'caption',
                    ],
                ]); ?>
        </div>
    </div>
</div>

<?php \yii\widgets\Pjax::end() ?>

<style>
    .btn-danger {
        background-color: #dd4b39;
        border-color: #d73925;
        display: none;
    }
</style>