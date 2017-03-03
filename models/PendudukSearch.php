<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penduduk;

/**
* PendudukSearch represents the model behind the search form about `app\models\Penduduk`.
*/
class PendudukSearch extends Penduduk
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'agama', 'status_perkawinan'], 'integer'],
            [['nik', 'nama', 'jenis_kelamin', 'gol_darah', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'rt', 'rw', 'kel_desa', 'kecamatan', 'pekerjaan', 'kewarganegaraan'], 'safe'],
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
$query = Penduduk::find();

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
            'tanggal_lahir' => $this->tanggal_lahir,
            'agama' => $this->agama,
            'status_perkawinan' => $this->status_perkawinan,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'gol_darah', $this->gol_darah])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'kel_desa', $this->kel_desa])
            ->andFilterWhere(['like', 'kecamatan', $this->kecamatan])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'kewarganegaraan', $this->kewarganegaraan]);

return $dataProvider;
}
}