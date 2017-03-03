<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengaturan;

/**
* PengaturanSearch represents the model behind the search form about `app\models\Pengaturan`.
*/
class PengaturanSearch extends Pengaturan
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id'], 'integer'],
            [['rt', 'rw', 'kel_desa', 'kecamatan'], 'safe'],
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
$query = Pengaturan::find();

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
        ]);

        $query->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'kel_desa', $this->kel_desa])
            ->andFilterWhere(['like', 'kecamatan', $this->kecamatan]);

return $dataProvider;
}
}