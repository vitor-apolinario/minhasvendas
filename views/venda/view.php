<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Venda */

$this->title = $model->num_venda;
$this->params['breadcrumbs'][] = ['label' => 'Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="venda-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'num_venda' => $model->num_venda, 'cd_fk_indu' => $model->cd_fk_indu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'num_venda' => $model->num_venda, 'cd_fk_indu' => $model->cd_fk_indu], [
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
            'num_venda',
            'cd_fk_indu',
            'cd_fk_cliente',
            'recebido',
            'frm_pgto',
            'vlr_total',
            'dt_venda',
            'dt_cadastro',
        ],
    ]) ?>

</div>
