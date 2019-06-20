<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venda;

/**
 * VendaSearch represents the model behind the search form of `app\models\Venda`.
 */
class VendaSearch extends Venda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_venda', 'recebido'], 'integer'],
            [['frm_pgto', 'dt_venda', 'dt_cadastro', 'cd_fk_indu', 'cd_fk_cliente'], 'safe'],
            [['vlr_total'], 'number'],
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
        $query = Venda::find();
        $query->joinWith(['industria']);
        $query->joinWith(['cliente']);

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
            'num_venda' => $this->num_venda,
            //'cd_fk_indu' => $this->cd_fk_indu,
            //'cd_fk_cliente' => $this->cd_fk_cliente,
            'recebido' => $this->recebido,
            'vlr_total' => $this->vlr_total,
            'dt_venda' => $this->dt_venda,
            'dt_cadastro' => $this->dt_cadastro,
        ]);

        $query//->andFilterWhere(['like', 'frm_pgto', $this->frm_pgto])
              ->andFilterWhere(['like', 'industria.nm_indu', $this->cd_fk_indu])
              ->andFilterWhere(['like', 'cliente.nm_cli',    $this->cd_fk_cliente]);

        return $dataProvider;
    }
}
