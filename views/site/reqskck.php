<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Ktp $model
 */

$this->title = 'Request Surat SKCK';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a('Kembali', \yii\helpers\Url::to('index'), ['class' => 'btn btn-default']) ?>
</p>

<?= $this->render('_form1', [
    'model' => $model,
]); ?>
<style>
    .content-wrapper, .right-side {
        min-height: 100%;
        background-color: #ecf0f5;
        z-index: 800;
        margin-left: 0px;
    }
    .main-footer {
        background: #fff;
        padding: 15px;
        color: #444;
        border-top: 1px solid #d2d6de;
        margin-left: 0;
    }
</style>