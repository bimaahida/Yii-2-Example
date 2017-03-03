<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "iuran".
 *
 * @property integer $id
 * @property integer $nik
 * @property string $nama
 * @property string $nominal
 * @property string $tanggal
 * @property string $keterangan
 * @property integer $user
 *
 * @property \app\models\User $user0
 * @property \app\models\Penduduk $nik0
 */
class Iuran extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'iuran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'nominal', 'keterangan'], 'required'],
            [['nik', 'user'], 'integer'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string'],
            [['nama'], 'string', 'max' => 60],
            [['nominal'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'NIK',
            'nama' => 'Nama Lengkap',
            'nominal' => 'Nominal',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'user' => 'User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNik0()
    {
        return $this->hasOne(\app\models\Penduduk::className(), ['id' => 'nik']);
    }




}
