<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\SkckSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="skck-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nik') ?>

		<?= $form->field($model, 'nik_nama') ?>

		<?= $form->field($model, 'nik_tempat_lahir') ?>

		<?= $form->field($model, 'nik_tanggal_lahir') ?>

		<?php // echo $form->field($model, 'nik_jenis_kelamin') ?>

		<?php // echo $form->field($model, 'nik_pekerjaan') ?>

		<?php // echo $form->field($model, 'nik_agama') ?>

		<?php // echo $form->field($model, 'nik_status_perkawinan') ?>

		<?php // echo $form->field($model, 'nik_kewarganegaraan') ?>

		<?php // echo $form->field($model, 'nik_alamat') ?>

		<?php // echo $form->field($model, 'rt') ?>

		<?php // echo $form->field($model, 'rw') ?>

		<?php // echo $form->field($model, 'tanggal_buat') ?>

		<?php // echo $form->field($model, 'user') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
