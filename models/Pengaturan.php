<?php

namespace app\models;

use Yii;
use dmstr\helpers\Html;
use \app\models\base\Pengaturan as BasePengaturan;

/**
 * This is the model class for table "pengaturan".
 */
class Pengaturan extends BasePengaturan
{
    public function getUpdate()
    {
        return
            Html::a(
                '<span class="fa fa-pencil"></span>',
                [
                    'update',
                ],
                [
                    'class' => 'btn btn-warning',
                  'data' => [
                        'method' => 'get',
                        'params' => ['id' => $this->id],
                    ]
                ]
            );


    }
}
