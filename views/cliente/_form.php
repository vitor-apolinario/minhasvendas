<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $estadosBrasileiros = array(
    'AC'=>'Acre',
    'AL'=>'Alagoas',
    'AP'=>'Amapá',
    'AM'=>'Amazonas',
    'BA'=>'Bahia',
    'CE'=>'Ceará',
    'DF'=>'Distrito Federal',
    'ES'=>'Espírito Santo',
    'GO'=>'Goiás',
    'MA'=>'Maranhão',
    'MT'=>'Mato Grosso',
    'MS'=>'Mato Grosso do Sul',
    'MG'=>'Minas Gerais',
    'PA'=>'Pará',
    'PB'=>'Paraíba',
    'PR'=>'Paraná',
    'PE'=>'Pernambuco',
    'PI'=>'Piauí',
    'RJ'=>'Rio de Janeiro',
    'RN'=>'Rio Grande do Norte',
    'RS'=>'Rio Grande do Sul',
    'RO'=>'Rondônia',
    'RR'=>'Roraima',
    'SC'=>'Santa Catarina',
    'SP'=>'São Paulo',
    'SE'=>'Sergipe',
    'TO'=>'Tocantins'
    );
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cd_cli')->textInput() ?>

    <?= $form->field($model, 'nm_cli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cnpj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList(['text' => 'Selecionar...', 'Opções' => $estadosBrasileiros])->label('Estado') ?>

    <script>
        function teste(uf, campocidade){
            $.get('https://servicodados.ibge.gov.br/api/v1/localidades/municipios', function(resultado){                
                
                cidades  = '<option value="text">Selecionar...</option>\n';
                cidades += '<optgroup label="options">\n';
                // isto é uma adaptação técnica
                for (city  in resultado){
                    if(resultado[city].microrregiao.mesorregiao.UF.sigla == uf)
                        cidades += `<option value="${resultado[city].id}">${resultado[city].nome}</option>\n`;
                }
                cidades += '</optgroup>\n';
                
                $('#cliente-cidade').html(cidades);
            });
        }
    </script>

    <?php 
        $this->registerJs(
            "$('#cliente-estado').on('change', function() { teste(this.value, '#cliente-cidade'); });",
            $this::POS_READY,
            'seleciona-estado'
        );
    ?>    

    <?= $form->field($model, 'cidade')->dropDownList(['text' => 'Selecionar...', 'options' => $estadosBrasileiros])->label('Cidade') ?>

    <?= $form->field($model, 'endereco')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
