<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\money\MaskMoney;

/**
 * @var yii\web\View $this
 * @var app\models\Pengeluaran $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="box box-info">
    <div class="box-body">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'Pengeluaran',
                    'layout' => 'horizontal',
                    'enableClientValidation' => true,
                    'errorSummaryCssClass' => 'error-summary alert alert-error'
                        ]
        );
        ?>
        <?=
        $form->field($model, 'nominal')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => 'Rp ',
                'allowNegative' => false
            ]
        ])
        ?>
        <?= $form->field($model, 'keperluan')->textarea(['rows' => 6]) ?>
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