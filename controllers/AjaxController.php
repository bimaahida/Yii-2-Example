<?php
namespace app\controllers;

use app\models\Penduduk;
use yii\rest\Controller;

class AjaxController extends Controller
{
    public function actionFindPenduduk($id){
        return Penduduk::searchByNIK($id);
    }

}