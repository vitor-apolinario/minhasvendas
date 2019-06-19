<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $cd_prod
 * @property string $nm_prod
 * @property int $cd_fk_indu
 * @property string $undmed
 * @property string $comiss
 * @property string $desc
 * @property string $grupo
 *
 * @property Industria $cdFkIndu
 * @property VendaItem[] $vendaItems
 * @property Venda[] $numFkVendas
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cd_prod', 'nm_prod', 'cd_fk_indu', 'undmed', 'comiss'], 'required'],
            [['cd_prod', 'cd_fk_indu'], 'integer'],
            [['comiss'], 'number'],
            [['desc'], 'string'],
            [['nm_prod'], 'string', 'max' => 50],
            [['undmed'], 'string', 'max' => 5],
            [['grupo'], 'string', 'max' => 15],
            [['cd_prod', 'cd_fk_indu'], 'unique', 'targetAttribute' => ['cd_prod', 'cd_fk_indu']],
            [['cd_fk_indu'], 'exist', 'skipOnError' => true, 'targetClass' => Industria::className(), 'targetAttribute' => ['cd_fk_indu' => 'cd_indu']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cd_prod' => 'Código',
            'nm_prod' => 'Nome',
            'cd_fk_indu' => 'Código do fabricante',
            'undmed' => 'Unidade de medida',
            'comiss' => 'Comissão',
            'desc' => 'Descrição',
            'grupo' => 'Grupo',
            'industria.nm_indu' => 'Indústria',
        ];
    }

    public static function grupo($cod){
        $grupos = array(
            'MIN' => 'MATERIAIS DE ORIGEM MINERAL',
            'MAD' => 'MADEIRAS E DERIVADOS',
            'VID' => 'VIDROS PARA CONSTRUCAO',
            'REV' => 'MATERIAIS PARA PISOS, PAREDES E TETOS',
            'COB' => 'MATERIAIS PARA COBERTURAS',
            'FER' => 'ESQUADRIAS E FERRAGENS',
            'ARQ' => 'ARTIGOS METALICOS PARA ARQUITETURA',
            'DIV' => 'CONSTRUCAO CIVIL - DIVERSOS'
        );

        return $grupos[$cod];
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
        return $this->hasMany(VendaItem::className(), ['cd_fk_prod' => 'cd_prod', 'cd_fk_indu' => 'cd_fk_indu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['num_venda' => 'num_fk_venda', 'cd_fk_indu' => 'cd_fk_indu'])->viaTable('venda_item', ['cd_fk_prod' => 'cd_prod', 'cd_fk_indu' => 'cd_fk_indu']);
    }

    /**
     * {@inheritdoc}
     * @return ProdutoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProdutoQuery(get_called_class());
    }
}
