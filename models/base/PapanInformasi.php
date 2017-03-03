<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "papan_informasi".
 *
 * @property integer $id
 * @property string $gambar
 * @property string $caption
 */
class PapanInformasi extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'papan_informasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caption'], 'required'],
            [['gambar', 'caption'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gambar' => 'Gambar',
            'caption' => 'Caption',
        ];
    }




}
