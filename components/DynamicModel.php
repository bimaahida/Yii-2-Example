<?php
/**
 * Created by PhpStorm.
 * User: Agus
 * Date: 7/27/2016
 * Time: 10:56 PM
 */

namespace app\components;

use yii\db\ActiveRecord;

class DynamicModel extends ActiveRecord
{

    private static $_tableName;

    public function __construct($tableName)
    {
        if (strlen($tableName) == 0) {
            return false;
        }

        if (strlen($tableName) > 0) {
            self::$_tableName = $tableName;
        }

        self::setIsNewRecord(true);
    }

    public static function model($tableName)
    {
        if (strlen($tableName) == 0) {
            return false;
        }

        $className = __CLASS__;

        if (strlen($tableName) > 0) {
            self::$_tableName = $tableName;
        }

        return parent::model($className);
    }

    public function tableName()
    {
        return '{{' . self::$_tableName . '}}';
    }

    public function setTableName($tableName)
    {
        self::$_tableName = $tableName;
    }


}