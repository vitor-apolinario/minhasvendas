<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form of `app\models\Produto`.
 */
class ProdutoSearch extends Produto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cd_prod'], 'integer'],
            [['nm_prod', 'undmed', 'desc', 'grupo', 'cd_fk_indu'], 'safe'],
            [['comiss'], 'number'],
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
        $query = Produto::find();
        $query->joinWith(['industria']);

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
            'cd_prod' => $this->cd_prod,
            // 'cd_fk_indu' => $this->cd_fk_indu,
            'comiss' => $this->comiss,
        ]);

        $query->andFilterWhere(['like', 'nm_prod', $this->nm_prod])
            ->andFilterWhere(['like', 'undmed', $this->undmed])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'grupo', $this->grupo])
            ->andFilterWhere(['like', 'industria.nm_indu', $this->cd_fk_indu]);

        return $dataProvider;
    }
}
