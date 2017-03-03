<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "penduduk".
 *
 * @property integer $id
 * @property string $nik
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $gol_darah
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $rt
 * @property string $rw
 * @property string $kel_desa
 * @property string $kecamatan
 * @property integer $agama
 * @property integer $status_perkawinan
 * @property string $pekerjaan
 * @property string $kewarganegaraan
 *
 * @property \app\models\Iuran[] $iurans
 * @property \app\models\Agama $agama0
 * @property \app\models\StatusPerkawinan $statusPerkawinan
 * @property \app\models\Tamu[] $tamus
 */
class Penduduk extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penduduk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'jenis_kelamin', 'gol_darah', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'rt', 'rw', 'kel_desa', 'kecamatan', 'agama', 'status_perkawinan', 'pekerjaan', 'kewarganegaraan'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['agama', 'status_perkawinan'], 'integer'],
            [['nik', 'kewarganegaraan'], 'string', 'max' => 25],
            [['nama'], 'string', 'max' => 60],
            [['jenis_kelamin'], 'string', 'max' => 15],
            [['gol_darah'], 'string', 'max' => 5],
            [['tempat_lahir', 'pekerjaan'], 'string', 'max' => 50],
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
            'nik' => 'NIK',
            'nama' => 'Nama Lengkap',
            'jenis_kelamin' => 'Jenis Kelamin',
            'gol_darah' => 'Golongan Darah',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'rt' => 'RT',
            'rw' => 'RW',
            'kel_desa' => 'Kelurahan/Desa',
            'kecamatan' => 'Kecamatan',
            'agama' => 'Agama',
            'status_perkawinan' => 'Status Perkawinan',
            'pekerjaan' => 'Pekerjaan',
            'kewarganegaraan' => 'Kewarganegaraan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIurans()
    {
        return $this->hasMany(\app\models\Iuran::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgama0()
    {
        return $this->hasOne(\app\models\Agama::className(), ['id' => 'agama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusPerkawinan()
    {
        return $this->hasOne(\app\models\StatusPerkawinan::className(), ['id' => 'status_perkawinan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTamus()
    {
        return $this->hasMany(\app\models\Tamu::className(), ['dituju' => 'id']);
    }

}
