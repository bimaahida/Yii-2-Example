<?php

namespace app\models;

use Yii;
use dmstr\helpers\Html;
use \app\models\base\Tamu as BaseTamu;

/**
 * This is the model class for table "tamu".
 */
class Tamu extends BaseTamu
{
    public function getCetak()
    {
        return
            Html::a(
                '<span class="glyphicon glyphicon-print"></span> &nbsp;' . 'Cetak Surat Tamu',
                [
                    'surat',
                ],
                [
                    'class' => 'btn btn-primary',
                    'target' => '_blank',
                    'data' => [
                        'method' => 'get',
                        'params' => ['id' => $this->id],
                    ]
                ]
            );


    }
}
