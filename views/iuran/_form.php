<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\select2\Select2;
use yii\web\View;
use kartik\money\MaskMoney;

/**
 * @var yii\web\View $this
 * @var app\models\Iuran $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="box box-info">
    <div class="box-body">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'Iuran',
                    'layout' => 'horizontal',
                    'enableClientValidation' => true,
                    'errorSummaryCssClass' => 'error-summary alert alert-error'
                        ]
        );
        ?>
        <?=
        $form->field($model, 'nik')->widget(Select2::className(), [
            'data' => \yii\helpers\ArrayHelper::map(app\models\Penduduk::find()->all(), 'nik', 'nik'),
            'language' => 'en',
            'options' => ['placeholder' => 'Pilih NIK ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>       
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'readOnly' => true]) ?>
        <?=
        $form->field($model, 'nominal')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => 'Rp ',
                'allowNegative' => false
            ]
        ])
        ?>

<?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>
        <hr/>
        <div class="row">
            <div class="col-md-offset-3 col-md-10">
<?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']); ?>
<?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>

<?php ActiveForm::end(); ?>

    </div>
</div>
<?php
$my_js = ' $( document ).ready(function() {
 $("#iuran-nik").change(function () {
                var nik = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "' . Yii::$app->urlManager->createUrl('iuran/get-data?nik=') . '"+nik,
                    success: function(data){
                        var obj = jQuery.parseJSON(data);
                        $("#iuran-nama").val(obj.data.nama);
                        console.log();
                            },
                         error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("some error");
                    }
                });
        });
});';
$this->registerJs($my_js, View::POS_END);
?>