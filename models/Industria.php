<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "industria".
 *
 * @property int $cd_indu
 * @property string $nm_indu
 * @property string $estado
 * @property string $cidade
 *
 * @property Produto[] $produtos
 * @property Venda[] $vendas
 */
class Industria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'industria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cd_indu', 'nm_indu', 'estado', 'cidade'], 'required'],
            [['cd_indu'], 'integer'],
            [['nm_indu', 'estado', 'cidade'], 'string', 'max' => 50],
            [['cd_indu'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cd_indu' => 'Cd Indu',
            'nm_indu' => 'Nm Indu',
            'estado' => 'Estado',
            'cidade' => 'Cidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['cd_fk_indu' => 'cd_indu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['cd_fk_indu' => 'cd_indu']);
    }

    /**
     * {@inheritdoc}
     * @return IndustriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IndustriaQuery(get_called_class());
    }
}
