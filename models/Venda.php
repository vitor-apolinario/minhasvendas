<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda".
 *
 * @property int $num_venda
 * @property int $cd_fk_indu
 * @property int $cd_fk_cliente
 * @property int $recebido
 * @property string $frm_pgto
 * @property string $vlr_total
 * @property string $dt_venda
 * @property string $dt_cadastro
 *
 * @property Titulo[] $titulos
 * @property Cliente $cdFkCliente
 * @property Industria $cdFkIndu
 * @property VendaItem[] $vendaItems
 * @property Produto[] $cdFkProds
 */
class Venda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_venda', 'cd_fk_indu', 'cd_fk_cliente', 'frm_pgto', 'vlr_total', 'dt_venda'], 'required'],
            [['num_venda', 'cd_fk_indu', 'cd_fk_cliente', 'recebido'], 'integer'],
            [['vlr_total'], 'number'],
            [['dt_venda', 'dt_cadastro'], 'safe'],
            [['frm_pgto'], 'string', 'max' => 50],
            [['num_venda', 'cd_fk_indu'], 'unique', 'targetAttribute' => ['num_venda', 'cd_fk_indu']],
            [['cd_fk_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cd_fk_cliente' => 'cd_cli']],
            [['cd_fk_indu'], 'exist', 'skipOnError' => true, 'targetClass' => Industria::className(), 'targetAttribute' => ['cd_fk_indu' => 'cd_indu']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num_venda' => 'Numero da venda',
            'cd_fk_indu' => 'Indústria',
            'cd_fk_cliente' => 'Cliente',
            'recebido' => 'Recebido',
            'frm_pgto' => 'Forma de pagamento',
            'vlr_total' => 'Valor total',
            'dt_venda' => 'Data da venda',
            'dt_cadastro' => 'Data de cadastro da venda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulos()
    {
        return $this->hasMany(Titulo::className(), ['num_fk_venda' => 'num_venda', 'cd_fk_indu_venda' => 'cd_fk_indu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['cd_cli' => 'cd_fk_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustria()
    {
        return $this->hasOne(Industria::className(), ['cd_indu' => 'cd_fk_indu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaItems()
    {
        return $this->hasMany(VendaItem::className(), ['num_fk_venda' => 'num_venda', 'cd_fk_indu' => 'cd_fk_indu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['cd_prod' => 'cd_fk_prod', 'cd_fk_indu' => 'cd_fk_indu'])->viaTable('venda_item', ['num_fk_venda' => 'num_venda', 'cd_fk_indu' => 'cd_fk_indu']);
    }
}
