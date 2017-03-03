<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Pengaturan $model
 */

$this->title = 'Pengaturan Domisili';
$this->params['breadcrumbs'][] = ['label' => 'Pengaturan Domisili', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edit';
?>

<?php echo $this->render('_form', [
    'model' => $model,
]); ?>
