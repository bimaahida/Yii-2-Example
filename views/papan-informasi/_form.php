<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\PapanInformasi $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
        'id' => 'PapanInformasi',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-error',
        'options' => ['enctype' => 'multipart/form-data'],
        ]
        );
        ?>
        <?= $form->field($model, 'gambar')->widget(\kartik\file\FileInput::className(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'allowedFileExtensions' => ['jpg'],
                'maxFileSize' => 100000,
            ],
        ]) ?>
        <?php
        if ($model->gambar != null){
            ?>

            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <?= Html::img(["uploads_informasi/" . $model->gambar], ["width" => "150px"]); ?>
                </div>
            </div>
            <?php
        }
        ?>
			<?= $form->field($model, 'caption')->textInput(['maxlength' => true]) ?>        <hr/>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-offset-3 col-md-10">
                <?=  Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']); ?>
                <?=  Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    </div>
</div>