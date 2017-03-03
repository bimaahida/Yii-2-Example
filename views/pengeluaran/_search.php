<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\PengeluaranSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="pengeluaran-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nominal') ?>

		<?= $form->field($model, 'keperluan') ?>

		<?= $form->field($model, 'tanggal') ?>

		<?= $form->field($model, 'user') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
