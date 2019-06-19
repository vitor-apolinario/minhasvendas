<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $model app\models\Industria */
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

<div class="industria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cd_indu')->textInput()->label('Código') ?>

    <?= $form->field($model, 'nm_indu')->textInput(['maxlength' => true])->label('Nome') ?>

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
                
                $('#industria-cidade').html(cidades);
            });
        }
    </script>

    <?php 
        $this->registerJs(
            "$('#industria-estado').on('change', function() { teste(this.value, '#industria-cidade'); });",
            $this::POS_READY,
            'seleciona-estado'
        );
    ?>

    <?= $form->field($model, 'cidade')->dropDownList(['text' => 'Selecionar...'])->label('Cidade') ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>