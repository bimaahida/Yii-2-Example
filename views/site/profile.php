<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\User $model
 */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="uploads/<?php echo Yii::$app->user->identity->photo_url ?>" alt="User profile picture">

                    <h3 class="profile-username text-center"><?php echo Yii::$app->user->identity->name ?></h3>

                    <p class="text-muted text-center"><?= Yii::$app->user->identity->role->name; ?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nama</b> <a class="pull-right"><?php echo Yii::$app->user->identity->name ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Jabatan</b> <a class="pull-right"><?= Yii::$app->user->identity->role->name; ?></a>
                        </li>

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2><?= $model->name ?></h2>
                    </div>

                    <div class="panel-body">

                        <div class="user-form">

                            <?php $form = ActiveForm::begin([
                                    'id' => 'User',
                                    'layout' => 'horizontal',
                                    'enableClientValidation' => false,
                                    'errorSummaryCssClass' => 'error-summary alert alert-error',
                                    'options' => ['enctype' => 'multipart/form-data'],
                                ]
                            );
                            ?>

                            <div class="">
                                <?php $this->beginBlock('main'); ?>

                                <p>
                                    <input type="tel" hidden/> <!-- disable chrome autofill -->
                                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'autocomplete' => "off"]) ?>
                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                    <?= $form->field($model, 'photo_url')->widget(\kartik\file\FileInput::className(), [
                                        'options' => ['accept' => 'image/*'],
                                        'pluginOptions' => [
                                            'allowedFileExtensions' => ['jpg', 'png', 'jpeg', 'gif', 'bmp'],
                                            'maxFileSize' => 250,
                                        ],
                                    ]) ?>
                                    <?php
                                    if ($model->photo_url != null){
                                    ?>

                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <?= Html::img(["uploads/" . $model->photo_url], ["width" => "150px"]); ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                                </p>
                                <?php $this->endBlock(); ?>

                                <?=
                                Tabs::widget(
                                    [
                                        'encodeLabels' => false,
                                        'items' => [[
                                            'label' => 'User',
                                            'content' => $this->blocks['main'],
                                            'active' => true,
                                        ],]
                                    ]
                                );
                                ?>
                                <hr/>
                                <?php echo $form->errorSummary($model); ?>
                                <?= Html::submitButton(
                                    '<span class="glyphicon glyphicon-check"></span> ' .
                                    ($model->isNewRecord ? 'Create' : 'Save'),
                                    [
                                        'id' => 'save-' . $model->formName(),
                                        'class' => 'btn btn-success'
                                    ]
                                );
                                ?>

                                <?php ActiveForm::end(); ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>