<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\time\TimePicker;
use kartik\date\DatePicker;
use \dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\Event $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
                'id' => 'Event',
                'layout' => 'horizontal',
                'enableClientValidation' => true,
                'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
        );
        ?>
        <?= $form->field($model, 'ditujukan')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'keperluan')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'tanggal')->widget(DatePicker::className(),[
            'name' => 'dp_2',
            'options' => ['placeholder' => 'Tanggal Event ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]) ?>
        <?= $form->field($model, 'jam')->widget(TimePicker::className(), [
            'name' => 't1',
            'pluginOptions' => [
                'showSeconds' => false,
                'showMeridian' => false,
            ],
            'addonOptions' => [
                'asButton' => true,
                'buttonOptions' => ['class' => 'btn btn-info']
            ]
        ]) ?>
        <hr/>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-offset-3 col-md-10">
                <?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']); ?>
                <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>