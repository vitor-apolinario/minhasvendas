<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */

$this->title = $model->cd_prod;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'cd_prod' => $model->cd_prod, 'cd_fk_indu' => $model->cd_fk_indu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'cd_prod' => $model->cd_prod, 'cd_fk_indu' => $model->cd_fk_indu], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cd_prod',
            'nm_prod',
            'cd_fk_indu',
            'undmed',
            'comiss',
            'desc:ntext',
            'grupo',
        ],
    ]) ?>

</div>
