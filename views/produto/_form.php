<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Produto;
use app\models\Industria;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $undMedidas = array(
    'UND'=>'Unidade',
    'KGS'=>'Palete',
    'LTS'=>'Litros',
    'PLT'=>'Palete',
    'MIL'=>'Milheiro',
    'MTS'=>'Metros'
    );

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
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cd_prod')->textInput() ?>

    <?= $form->field($model, 'nm_prod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cd_fk_indu')->dropDownList(['text' => 'Selecionar...', 'Opções' => ArrayHelper::map(Industria::find()->all(), 'cd_indu', 'nm_indu')])->label('Fabricante')?>
    
    <?= $form->field($model, 'grupo')->dropDownList(['text' => 'Selecionar...', 'Opções' => $grupos])->label('Grupo') ?>

    <?= $form->field($model, 'undmed')->dropDownList(['text' => 'Selecionar...', 'Opções' => $undMedidas])->label('Unidade de medida') ?>

    <?= $form->field($model, 'comiss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 3]) ?>    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
