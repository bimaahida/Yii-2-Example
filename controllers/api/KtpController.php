<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "KtpController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class KtpController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Ktp';
}
