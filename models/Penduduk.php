<?php

namespace app\models;

use Yii;
use \app\models\base\Penduduk as BasePenduduk;

/**
 * This is the model class for table "penduduk".
 */
class Penduduk extends BasePenduduk
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
    public function getKelurahan()
    {
        $rt = Pengaturan::findOne(['id' => 1]);
        return $rt->kel_desa;
    }
    public function getKecamatan()
    {
        $rt = Pengaturan::findOne(['id' => 1]);
        return $rt->kecamatan;
    }
    public static function searchByNIK($nik){

        $param = ['nik'=>$nik];
        $p = Penduduk::findOne($param);
        if($p != null){
            $result = $p->toArray();
            $result['message'] = 'data-found';
        }else{
            $result['message'] = 'no-data-found';

        }
        return $result;
    }
    
}
