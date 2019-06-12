<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cd_prod') ?>

    <?= $form->field($model, 'nm_prod') ?>

    <?= $form->field($model, 'cd_fk_indu') ?>

    <?= $form->field($model, 'undmed') ?>

    <?= $form->field($model, 'comiss') ?>

    <?php // echo $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'grupo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
