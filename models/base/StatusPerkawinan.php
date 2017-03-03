<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "status_perkawinan".
 *
 * @property integer $id
 * @property string $status_perkawinan
 *
 * @property \app\models\Penduduk[] $penduduks
 */
class StatusPerkawinan extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_perkawinan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_perkawinan'], 'required'],
            [['status_perkawinan'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_perkawinan' => 'Status Perkawinan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenduduks()
    {
        return $this->hasMany(\app\models\Penduduk::className(), ['status_perkawinan' => 'id']);
    }




}
