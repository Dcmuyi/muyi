<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" id="web-icon" href="https://wujunze.com/favicon.ico" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<!---->
<!--    <script src="--><?php //echo Yii::$app->params['b2bUrl'].'/cropper/jquery-1.12.4.min.js' ?><!--"></script>-->
<!--    <script src="--><?php //echo Yii::$app->params['b2bUrl'].'/cropper/bootstrap.min.js' ?><!--"></script>-->
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    NavBar::begin([
        'brandLabel' => 'test',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top navbar',
        ],
    ]);

    $menuItems = [
        ['label' => '首页', 'url' => ['/site/index']],
    ];


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left nav-pills'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);

    $menuItems = [
        ['label' => '关于我们', 'url' => ['/site/about']],
        ['label' => '联系我们', 'url' => ['/site/contact']],
    ];

    if (Yii::$app->user->isGuest)
    {
        $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    }
    else
    {
        $menuItems[] = [
            'label' => Yii::$app->user->identity->username,
            'items' => [
                ['label' => '测试111', 'url' => '#'],
                '<li class="divider"></li>',
                ['label' => '测试222', 'url' => '#'],
                ['label' => '退出', 'url' =>['/site/logout']],
            ],
        ];
    }

    echo Html::beginForm(['site/search'], 'get', ['class' => 'navbar-form visible-lg-inline-block']);
    echo Html::textInput('keyword', '', ['class' => 'form-control']);

    echo Html::endForm();

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right nav-pills'],
        'items' => $menuItems,
        'encodeLabels' => false,
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
