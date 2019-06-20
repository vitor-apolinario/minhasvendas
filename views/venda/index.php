<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Venda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'num_venda',
            [
                'attribute' => 'cd_fk_indu',
                'value' => 'industria.nm_indu'
            ],
            [
                'attribute' => 'cd_fk_cliente',
                'value' => 'cliente.nm_cli'
            ],
            'recebido',
            'frm_pgto',
            'vlr_total',
            'dt_venda',
            'dt_cadastro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
