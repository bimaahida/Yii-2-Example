<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "tamu".
 *
 * @property integer $id
 * @property string $nik_tamu
 * @property string $nama_tamu
 * @property integer $dituju
 * @property string $keperluan
 * @property string $tanggal
 * @property integer $user
 *
 * @property \app\models\Penduduk $dituju0
 * @property \app\models\User $user0
 */
class Tamu extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tamu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik_tamu', 'nama_tamu', 'dituju', 'keperluan'], 'required'],
            [['dituju', 'user'], 'integer'],
            [['keperluan'], 'string'],
            [['tanggal'], 'safe'],
            [['nik_tamu'], 'string', 'max' => 25],
            [['nama_tamu'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik_tamu' => 'NIK Tamu',
            'nama_tamu' => 'Nama Lengkap Tamu',
            'dituju' => 'Dituju',
            'keperluan' => 'Keperluan',
            'tanggal' => 'Tanggal',
            'user' => 'User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDituju0()
    {
        return $this->hasOne(\app\models\Penduduk::className(), ['id' => 'dituju']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user']);
    }

    public function getNamaRt()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user']);
    }


}
