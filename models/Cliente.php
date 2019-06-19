<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $cd_cli
 * @property string $nm_cli
 * @property string $cpf
 * @property string $cnpj
 * @property string $telefone
 * @property string $estado
 * @property string $cidade
 * @property string $endereco
 *
 * @property Venda[] $vendas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cd_cli', 'nm_cli', 'telefone', 'estado', 'cidade'], 'required'],
            [['cd_cli'], 'integer'],
            [['endereco'], 'string'],
            [['nm_cli', 'estado', 'cidade'], 'string', 'max' => 50],
            [['cpf', 'cnpj'], 'string', 'max' => 15],
            [['telefone'], 'string', 'max' => 30],
            [['cd_cli'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cd_cli' => 'Código',
            'nm_cli' => 'Nome',
            'cpf' => 'CPF',
            'cnpj' => 'CNPJ',
            'telefone' => 'Telefone',
            'estado' => 'Estado',
            'cidade' => 'Cidade',
            'endereco' => 'Endereço',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['cd_fk_cliente' => 'cd_cli']);
    }

    /**
     * {@inheritdoc}
     * @return ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClienteQuery(get_called_class());
    }
}
