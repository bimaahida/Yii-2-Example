<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tamu;

/**
* TamuSearch represents the model behind the search form about `app\models\Tamu`.
*/
class TamuSearch extends Tamu
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'dituju', 'user'], 'integer'],
            [['nik_tamu', 'nama_tamu', 'keperluan', 'tanggal'], 'safe'],
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
$query = Tamu::find();

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
            'dituju' => $this->dituju,
            'tanggal' => $this->tanggal,
            'user' => $this->user,
        ]);

        $query->andFilterWhere(['like', 'nik_tamu', $this->nik_tamu])
            ->andFilterWhere(['like', 'nama_tamu', $this->nama_tamu])
            ->andFilterWhere(['like', 'keperluan', $this->keperluan]);

return $dataProvider;
}
}