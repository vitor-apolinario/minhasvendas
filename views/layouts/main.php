<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/12ae7e5490.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
 <div class="wrap">
     <a href="/index.php">
        <div class="initial-header">
            <i class="fas fa-chart-bar fa-4x"></i>
            <h1 class="brand-label">Minhas vendas</h1>
        </div>
    </a>
    <hr>
    <div style="display: flex; justify-content: space-around;">
        <a href="/?r=venda/index"><i class="far fa-money-bill-alt fa-3x"></i></a>
        <a href="/?r=industria/index"><i class="fas fa-industry fa-3x"></i></a>
        <a href="?r=cliente/index"><i class="fas fa-users fa-3x"></i></a>
        <a href="/?r=produto/index"><i class="fas fa-cart-plus fa-3x"></i></a>
    </div>
    <hr>
    <div>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
