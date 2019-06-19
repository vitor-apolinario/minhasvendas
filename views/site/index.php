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
                    'label' => 'Indústrias', // '<i class="fas fa-caret-down"></i>'
                    'content' => [
                        '<a href="?r=industria/create">Nova Indústria</a>',
                        '<a href="?r=industria/index">Minhas Indústrias</a>'                        
                    ],
                ],
                [
                    'label' => 'Produtos',
                    'content' => [
                        '<a href="?r=produto/create">Novo Produto</a>',
                        '<a href="?r=produto/index">Meus Produtos</a>'
                    ],
                ],
                [
                    'label' => 'Clientes',
                    'content' => [
                        '<a href="?r=cliente/create">Novo cliente</a>',
                        '<a href="?r=cliente/index">Meus clientes</a>',
                    ],
                ],
            ]
        ]);
        ?>
    </div>
</div>