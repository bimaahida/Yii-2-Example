<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "agama".
 *
 * @property integer $id
 * @property string $nama_agama
 *
 * @property \app\models\Penduduk[] $penduduks
 */
class Agama extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_agama'], 'required'],
            [['nama_agama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_agama' => 'Agama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenduduks()
    {
        return $this->hasMany(\app\models\Penduduk::className(), ['agama' => 'id']);
    }




}
