<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "pengeluaran".
 *
 * @property integer $id
 * @property string $nominal
 * @property string $keperluan
 * @property string $tanggal
 * @property integer $user
 *
 * @property \app\models\User $user0
 */
class Pengeluaran extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengeluaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nominal', 'keperluan'], 'required'],
            [['keperluan'], 'string'],
            [['tanggal'], 'safe'],
            [['user'], 'integer'],
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
            'nominal' => 'Nominal',
            'keperluan' => 'Keperluan',
            'tanggal' => 'Tanggal',
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




}
