<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "event".
 *
 * @property integer $id
 * @property string $ditujukan
 * @property string $keperluan
 * @property string $tempat
 * @property string $tanggal
 * @property string $jam
 * @property integer $user
 *
 * @property \app\models\User $user0
 */
class Event extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ditujukan', 'keperluan', 'tempat', 'tanggal', 'jam'], 'required'],
            [['keperluan'], 'string'],
            [['tanggal', 'jam'], 'safe'],
            [['user'], 'integer'],
            [['ditujukan', 'tempat'], 'string', 'max' => 250],
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
            'ditujukan' => 'Ditujukan Kepada',
            'keperluan' => 'Keperluan Acara',
            'tempat' => 'Tempat Acara',
            'tanggal' => 'Tanggal Acara',
            'jam' => 'Jam Mulai',
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
    public function getNamaRt()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user']);
    }



}
