<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

$this->title = 'Masuk - '.Yii::$app->name;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <?= Html::img(["images/logo2.png"], ["style"=>"width:560px;margin-left:-100px"]) ?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Silakan masukkan username & password</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('<i class="fa fa-lock"></i> Masuk', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <hr>

        <div class="row">
            <div class="col-xs-6">
                <?= Html::a("Req e-KTP", ["site/request"], ["class"=>"btn btn-warning btn-block btn-flat"]) ?>
                </div>
            <div class="col-xs-6">
                <?= Html::a("Req SKCK", ["site/reqskck"], ["class"=>"btn btn-info btn-block btn-flat"]) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

        <!--
        <a href="#">I forgot my password</a><br>
        <?= Html::a("Register a new membership", ["site/register"], ["class"=>"btn btn-primary btn-block btn-flat"]) ?>
        -->

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->