<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\KtpSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ktp-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nik') ?>

		<?= $form->field($model, 'nik_nama') ?>

		<?= $form->field($model, 'nik_tempat_lahir') ?>

		<?= $form->field($model, 'nik_tanggal_lahir') ?>

		<?php // echo $form->field($model, 'jenis_kelamin') ?>

		<?php // echo $form->field($model, 'pekerjaan') ?>

		<?php // echo $form->field($model, 'agama') ?>

		<?php // echo $form->field($model, 'status_perkawinan') ?>

		<?php // echo $form->field($model, 'kewarganegaraan') ?>

		<?php // echo $form->field($model, 'alamat') ?>

		<?php // echo $form->field($model, 'rt') ?>

		<?php // echo $form->field($model, 'rw') ?>

		<?php // echo $form->field($model, 'user') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
