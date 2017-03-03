<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ktp;

/**
 * KtpSearch represents the model behind the search form about `app\models\Ktp`.
 */
class KtpSearch extends Ktp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nik', 'nik_agama', 'nik_status_perkawinan', 'user'], 'integer'],
            [['nik_nama', 'nik_tempat_lahir', 'nik_tanggal_lahir', 'nik_pekerjaan', 'nik_jenis_kelamin', 'nik_kewarganegaraan', 'nik_alamat', 'rt', 'rw'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
// bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ktp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'nik' => $this->nik,
            'nik_tanggal_lahir' => $this->nik_tanggal_lahir,
            'nik_pekerjaan' => $this->nik_pekerjaan,
            'nik_agama' => $this->nik_agama,
            'status_perkawinan' => $this->nik_status_perkawinan,
            'user' => $this->user,
        ]);

        $query->andFilterWhere(['like', 'nik_nama', $this->nik_nama])
            ->andFilterWhere(['like', 'nik_tempat_lahir', $this->nik_tempat_lahir])
            ->andFilterWhere(['like', 'nik_jenis_kelamin', $this->nik_jenis_kelamin])
            ->andFilterWhere(['like', 'nik_kewarganegaraan', $this->nik_kewarganegaraan])
            ->andFilterWhere(['like', 'nik_alamat', $this->nik_alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw]);

        return $dataProvider;
    }
}