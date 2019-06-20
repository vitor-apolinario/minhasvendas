<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VendaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'num_venda') ?>

    <?= $form->field($model, 'cd_fk_indu') ?>

    <?= $form->field($model, 'cd_fk_cliente') ?>

    <?= $form->field($model, 'recebido') ?>

    <?= $form->field($model, 'frm_pgto') ?>

    <?php // echo $form->field($model, 'vlr_total') ?>

    <?php // echo $form->field($model, 'dt_venda') ?>

    <?php // echo $form->field($model, 'dt_cadastro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
