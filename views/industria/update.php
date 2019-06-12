<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Industria */

$this->title = 'Update Industria: ' . $model->cd_indu;
$this->params['breadcrumbs'][] = ['label' => 'Industrias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cd_indu, 'url' => ['view', 'id' => $model->cd_indu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="industria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
