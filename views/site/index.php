<?php

/* @var $this yii\web\View */

use yii\bootstrap\Collapse;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
    <?php 
        echo Collapse::widget([
            'items' => [
                [
                    'label' => 'Vendas',
                    'content' => [
                        'Nova venda',
                        'Minhas vendas',
                    ],
                ],
                [
                    'label' => 'Indústrias',
                    'content' => [
                        '<a href="?r=industria/index">Nova Indústria</a>',
                        '<a href="?r=industria/index">Minhas Indústrias</a>'
                    ],
                ],
                [
                    'label' => 'Produtos',
                    'content' => [
                        '<a href="?r=produto/index">Novo Produto</a>',
                        '<a href="?r=produto/index">Meus Produtos</a>'
                    ],
                ],
                [
                    'label' => 'Clientes',
                    'content' => [
                        '<a href="?r=cliente/index">Novo cliente</a>',
                        '<a href="?r=cliente/view/1">Meus clientes</a>',
                    ],
                ],
            ]
        ]);
        ?>
    </div>
</div>
