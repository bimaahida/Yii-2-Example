<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Iuran;

/**
* IuranSearch represents the model behind the search form about `app\models\Iuran`.
*/
class IuranSearch extends Iuran
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'nik', 'user'], 'integer'],
            [['nama', 'nominal', 'tanggal', 'keterangan'], 'safe'],
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
$query = Iuran::find();

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
            'tanggal' => $this->tanggal,
            'user' => $this->user,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nominal', $this->nominal])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

return $dataProvider;
}
}