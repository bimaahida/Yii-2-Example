<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\PendudukSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="penduduk-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nik') ?>

		<?= $form->field($model, 'nama') ?>

		<?= $form->field($model, 'jenis_kelamin') ?>

		<?= $form->field($model, 'gol_darah') ?>

		<?php // echo $form->field($model, 'tempat_lahir') ?>

		<?php // echo $form->field($model, 'tanggal_lahir') ?>

		<?php // echo $form->field($model, 'alamat') ?>

		<?php // echo $form->field($model, 'rt') ?>

		<?php // echo $form->field($model, 'rw') ?>

		<?php // echo $form->field($model, 'kel_desa') ?>

		<?php // echo $form->field($model, 'kecamatan') ?>

		<?php // echo $form->field($model, 'agama') ?>

		<?php // echo $form->field($model, 'status_perkawinan') ?>

		<?php // echo $form->field($model, 'pekerjaan') ?>

		<?php // echo $form->field($model, 'kewarganegaraan') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
