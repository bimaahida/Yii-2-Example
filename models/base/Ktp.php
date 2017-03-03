<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "ktp".
 *
 * @property integer $id
 * @property string $nik
 * @property string $nik_nama
 * @property string $nik_tempat_lahir
 * @property string $nik_tanggal_lahir
 * @property string $nik_jenis_kelamin
 * @property string $nik_pekerjaan
 * @property integer $nik_agama
 * @property integer $nik_status_perkawinan
 * @property string $nik_kewarganegaraan
 * @property string $nik_alamat
 * @property string $rt
 * @property string $rw
 * @property string $tanggal_buat
 * @property integer $user
 *
 * @property \app\models\Agama $nikAgama
 * @property \app\models\StatusPerkawinan $nikStatusPerkawinan
 * @property \app\models\User $user0
 */
class Ktp extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ktp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'nik_nama', 'nik_tempat_lahir', 'nik_tanggal_lahir', 'nik_jenis_kelamin', 'nik_pekerjaan', 'nik_agama', 'nik_status_perkawinan', 'nik_kewarganegaraan', 'nik_alamat', 'rt', 'rw', 'tanggal_buat', 'user'], 'required'],
            [['nik_tanggal_lahir', 'tanggal_buat'], 'safe'],
            [['nik_agama', 'nik_status_perkawinan', 'user'], 'integer'],
            [['nik_alamat'], 'string'],
            [['nik', 'nik_kewarganegaraan'], 'string', 'max' => 25],
            [['nik_nama'], 'string', 'max' => 60],
            [['nik_tempat_lahir', 'nik_pekerjaan'], 'string', 'max' => 50],
            [['nik_jenis_kelamin'], 'string', 'max' => 15],
            [['rt', 'rw'], 'string', 'max' => 10],
            [['nik_agama'], 'exist', 'skipOnError' => true, 'targetClass' => Agama::className(), 'targetAttribute' => ['nik_agama' => 'id']],
            [['nik_status_perkawinan'], 'exist', 'skipOnError' => true, 'targetClass' => StatusPerkawinan::className(), 'targetAttribute' => ['nik_status_perkawinan' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']]
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
            'nik_nama' => 'Nama Lengkap',
            'nik_tempat_lahir' => 'Tempat Lahir',
            'nik_tanggal_lahir' => 'Tanggal Lahir',
            'nik_jenis_kelamin' => 'Jenis Kelamin',
            'nik_pekerjaan' => 'Pekerjaan',
            'nik_agama' => 'Agama',
            'nik_status_perkawinan' => 'Status Perkawinan',
            'nik_kewarganegaraan' => 'Kewarganegaraan',
            'nik_alamat' => 'Alamat',
            'rt' => 'RT',
            'rw' => 'RW',
            'tanggal_buat' => 'Tanggal Buat',
            'user' => 'User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNikAgama()
    {
        return $this->hasOne(\app\models\Agama::className(), ['id' => 'nik_agama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNikStatusPerkawinan()
    {
        return $this->hasOne(\app\models\StatusPerkawinan::className(), ['id' => 'nik_status_perkawinan']);
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
