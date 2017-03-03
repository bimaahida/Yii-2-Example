<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "pengaturan".
 *
 * @property integer $id
 * @property string $rt
 * @property string $rw
 * @property string $kel_desa
 * @property string $kecamatan
 */
class Pengaturan extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengaturan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rt', 'rw', 'kel_desa', 'kecamatan'], 'required'],
            [['rt', 'rw'], 'string', 'max' => 10],
            [['kel_desa', 'kecamatan'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rt' => 'RT',
            'rw' => 'RW',
            'kel_desa' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
        ];
    }




}
