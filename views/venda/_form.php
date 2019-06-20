<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;;
use yii\widgets\ActiveForm;

use yii\widgets\MaskedInput;

use app\models\Cliente;
use app\models\Industria;
use app\models\Produto;
use app\models\VendaItem;

/* @var $this yii\web\View */
/* @var $model app\models\Venda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-form">

    <?php
        $undMedidas = array(
            'UND'=>'Unidade',
            'KGS'=>'Palete',
            'LTS'=>'Litros',
            'PLT'=>'Palete',
            'MIL'=>'Milheiro',
            'MTS'=>'Metros'
        );

        $item = new VendaItem();
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_venda')->textInput() ?>

    <?= $form->field($model, 'cd_fk_indu')->dropDownList(['text' => 'Selecionar...', 'Opções' => ArrayHelper::map(Industria::find()->all(), 'cd_indu', 'nm_indu')])->label('Indústria')?>

    <?= $form->field($model, 'cd_fk_cliente')->dropDownList(['text' => 'Selecionar...', 'Opções' => ArrayHelper::map(Cliente::find()->all(), 'cd_cli', 'nm_cli')])->label('Cliente')?>

    <?= $form->field($model, 'frm_pgto')->dropDownList(['text' => 'Selecionar...', 'Opções' => array('AV' => 'À VISTA', '30/60/90' => '30/60/90', '30/45/60' => '30/45/60') ])->label('Forma de pagamento'); ?>

    <?= $form->field($model, 'vlr_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dt_venda')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99/99/9999',]); ?>

    <?= $form->field($model, 'dt_cadastro')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99/99/9999',]); ?>

    <?= $form->field($model, 'recebido')->checkBox() ?>

    <?= $form->field($item, 'cd_fk_prod')->dropDownList(['text' => 'Selecionar...', 'Opções' => ArrayHelper::map(Produto::find()->all(), 'cd_prod', 'nm_prod') ])->label('Produto') ?>

    <?= $form->field($item, 'undvnd')->dropDownList(['text' => 'Selecionar...', 'Opções' => $undMedidas ])->label('Unidade de venda') ?>
    
    <?= $form->field($item, 'qtd')->textInput(['type' => 'number']) ?>
    
    <?= $form->field($item, 'vlr_und')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
