<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Produto;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?= $model->tableName(); ?>

    <?php 
        $teste = Produto::findAll(1);
        echo "<pre>";
        var_dump($teste);
        echo "</pre>";
        foreach ($teste as $prod)
            echo $prod["cd_prod"];
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cd_prod')->textInput() ?>

    <?= $form->field($model, 'nm_prod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cd_fk_indu')->textInput() ?>

    <?= $form->field($model, 'undmed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comiss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'grupo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
