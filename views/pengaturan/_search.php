<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\PengaturanSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="pengaturan-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'rt') ?>

		<?= $form->field($model, 'rw') ?>

		<?= $form->field($model, 'kel_desa') ?>

		<?= $form->field($model, 'kecamatan') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
