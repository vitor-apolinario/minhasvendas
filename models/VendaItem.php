<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda_item".
 *
 * @property int $cd_fk_prod
 * @property int $num_fk_venda
 * @property int $cd_fk_indu
 * @property string $undvnd
 * @property int $qtd
 * @property string $vlr_und
 *
 * @property Produto $cdFkProd
 * @property Venda $numFkVenda
 */
class VendaItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venda_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cd_fk_prod', 'num_fk_venda', 'cd_fk_indu', 'undvnd', 'qtd', 'vlr_und'], 'required'],
            [['cd_fk_prod', 'num_fk_venda', 'cd_fk_indu', 'qtd'], 'integer'],
            [['vlr_und'], 'number'],
            [['undvnd'], 'string', 'max' => 5],
            [['cd_fk_prod', 'num_fk_venda', 'cd_fk_indu'], 'unique', 'targetAttribute' => ['cd_fk_prod', 'num_fk_venda', 'cd_fk_indu']],
            [['cd_fk_prod', 'cd_fk_indu'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['cd_fk_prod' => 'cd_prod', 'cd_fk_indu' => 'cd_fk_indu']],
            [['num_fk_venda', 'cd_fk_indu'], 'exist', 'skipOnError' => true, 'targetClass' => Venda::className(), 'targetAttribute' => ['num_fk_venda' => 'num_venda', 'cd_fk_indu' => 'cd_fk_indu']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cd_fk_prod' => 'Cd Fk Prod',
            'num_fk_venda' => 'Num Fk Venda',
            'cd_fk_indu' => 'Cd Fk Indu',
            'undvnd' => 'Undvnd',
            'qtd' => 'Qtd',
            'vlr_und' => 'Vlr Und',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['cd_prod' => 'cd_fk_prod', 'cd_fk_indu' => 'cd_fk_indu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenda()
    {
        return $this->hasOne(Venda::className(), ['num_venda' => 'num_fk_venda', 'cd_fk_indu' => 'cd_fk_indu']);
    }
}
