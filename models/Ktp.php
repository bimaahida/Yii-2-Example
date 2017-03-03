<?php

namespace app\models;

use Yii;
use dmstr\helpers\Html;
use \app\models\base\Ktp as BaseKtp;

/**
 * This is the model class for table "ktp".
 */
class Ktp extends BaseKtp
{
    public function getRt()
    {
        $rt = Pengaturan::findOne(['id' => 1]);
        return $rt->rt;
    }
    public function getRw()
    {
        $rt = Pengaturan::findOne(['id' => 1]);
        return $rt->rw;
    }
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
