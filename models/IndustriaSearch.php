<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Industria;

/**
 * IndustriaSearch represents the model behind the search form of `app\models\Industria`.
 */
class IndustriaSearch extends Industria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cd_indu'], 'integer'],
            [['nm_indu', 'estado', 'cidade'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Industria::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cd_indu' => $this->cd_indu,
        ]);

        $query->andFilterWhere(['like', 'nm_indu', $this->nm_indu])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'cidade', $this->cidade]);

        return $dataProvider;
    }
}
