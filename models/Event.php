<?php

namespace app\models;

use Yii;
use dmstr\helpers\Html;
use \app\models\base\Event as BaseEvent;

/**
 * This is the model class for table "event".
 */
class Event extends BaseEvent
{
    public function getCetak()
    {
        return
            Html::a(
                '<span class="glyphicon glyphicon-print"></span> &nbsp;' . 'Cetak Surat',
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
