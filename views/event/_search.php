<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\EventSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="event-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'ditujukan') ?>

		<?= $form->field($model, 'keperluan') ?>

		<?= $form->field($model, 'tempat') ?>

		<?= $form->field($model, 'tanggal') ?>

		<?php // echo $form->field($model, 'jam') ?>

		<?php // echo $form->field($model, 'user') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
