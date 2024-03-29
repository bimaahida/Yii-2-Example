<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;

/**
 * @var yii\web\View $this
 * @var app\models\Penduduk $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<?php
$j_kel = array(
    'Laki - Laki' => 'Laki - Laki',
    'Perempuan' => 'Perempuan'
);
$gol_darah = array(
    '-' => '-',
    'O' => 'O',
    'A' => 'A',
    'B' => 'B',
    'AB' => 'AB'
);
$kewarganegaraan_asal = array(
    'WNI' => 'Warga Negara Indonesia',
    'WNA' => 'Warga Negara Asing',
);
?>

<div class="box box-info">
    <div class="box-body">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'Penduduk',
                    'layout' => 'horizontal',
                    'enableClientValidation' => true,
                    'errorSummaryCssClass' => 'error-summary alert alert-error'
                        ]
        );
        ?>
        <?=
        $form->field($model, 'nik')->widget(MaskedInput::className(), [
            'name' => 'input-3',
            'mask' => '9',
            'clientOptions' => ['repeat' => 25, 'greedy' => false]
        ])
        ?>
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        <?=
        $form->field($model, 'jenis_kelamin')->widget(Select2::className(), [
            'data' => $j_kel,
            'language' => 'en',
            'options' => ['placeholder' => 'Pillih Jenis Kelamin ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
        ?>
        <?=
        $form->field($model, 'gol_darah')->widget(Select2::className(), [
            'data' => $gol_darah,
            'language' => 'en',
            'options' => ['placeholder' => 'Pillih Golongan Darah ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
        ?>
        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
        <?=
        $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(), [
            'name' => 'dp_2',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ],
        ])
        ?>
        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'rt')->textInput(['maxlength' => true, 'value' => $model->getRt(), 'readOnly' => true]) ?>
        <?= $form->field($model, 'rw')->textInput(['maxlength' => true, 'value' => $model->getRw(), 'readOnly' => true]) ?>
        <?= $form->field($model, 'kel_desa')->textInput(['maxlength' => true, 'value' => $model->getKelurahan(), 'readOnly' => true]) ?>
        <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true, 'value' => $model->getKecamatan(), 'readOnly' => true]) ?>
        <?=
        // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
        $form->field($model, 'agama')->widget(Select2::className(), [
            'data' => \yii\helpers\ArrayHelper::map(app\models\Agama::find()->all(), 'id', 'nama_agama'),
            'language' => 'en',
            'options' => ['placeholder' => 'Pillih Agama ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
        <?=
        // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
        $form->field($model, 'status_perkawinan')->widget(Select2::className(), [
            'data' => \yii\helpers\ArrayHelper::map(app\models\StatusPerkawinan::find()->all(), 'id', 'status_perkawinan'),
            'language' => 'en',
            'options' => ['placeholder' => 'Pillih Status Perkawinan ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
        <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>
        <?=
        $form->field($model, 'kewarganegaraan')->widget(Select2::className(), [
            'data' => $kewarganegaraan_asal,
            'language' => 'en',
            'options' => ['placeholder' => 'Pillih Kewarganegaraan ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
        ?>
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