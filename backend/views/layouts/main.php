<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$this->registerCssFile(Yii::$app->params['webUrl'].'/static/site.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo Yii::$app->params['webUrl'].'/static/jquery-3.1.1.min.js' ?>"></script>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Muyi\'s blog',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => 'D', 'url' => Yii::$app->params['webUrl']],

        ['label' => 'C', 'url' => Yii::$app->params['webUrl']],
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Mu Yi <?= '2016 - '.date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
<script type="text/javascript" color="255,127,80" opacity="0.7" zindex="-2" count="150" src="//cdn.bootcss.com/canvas-nest.js/1.0.0/canvas-nest.min.js"></script>

</html>
<?php $this->endPage() ?>