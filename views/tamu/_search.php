<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\TamuSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tamu-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nik_tamu') ?>

		<?= $form->field($model, 'nama_tamu') ?>

		<?= $form->field($model, 'dituju') ?>

		<?= $form->field($model, 'keperluan') ?>

		<?php // echo $form->field($model, 'tanggal') ?>

		<?php // echo $form->field($model, 'user') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
