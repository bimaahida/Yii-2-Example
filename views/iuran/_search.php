<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\IuranSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="iuran-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nik') ?>

		<?= $form->field($model, 'nama') ?>

		<?= $form->field($model, 'nominal') ?>

		<?= $form->field($model, 'tanggal') ?>

		<?php // echo $form->field($model, 'keterangan') ?>

		<?php // echo $form->field($model, 'user') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
