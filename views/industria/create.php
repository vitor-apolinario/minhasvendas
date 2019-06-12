<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Industria */

$this->title = 'Create Industria';
$this->params['breadcrumbs'][] = ['label' => 'Industrias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
