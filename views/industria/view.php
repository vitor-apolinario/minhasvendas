<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Industria */

$this->title = $model->cd_indu;
$this->params['breadcrumbs'][] = ['label' => 'Industrias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="industria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cd_indu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cd_indu], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente deseja deletar esse registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cd_indu',
            'nm_indu',
            'estado',
            'cidade',
        ],
    ]) ?>

</div>
