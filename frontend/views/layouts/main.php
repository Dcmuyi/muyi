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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <script src="<?php echo Yii::$app->params['b2bUrl'].'/cropper/jquery-1.12.4.min.js' ?>"></script>
    <script src="<?php echo Yii::$app->params['b2bUrl'].'/cropper/bootstrap.min.js' ?>"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '首页',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '首页', 'url' => ['/site/index']],
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
            'label' => "下拉",
            'items' => [
                ['label' => '测试111', 'url' => '#'],
                '<li class="divider"></li>',
                ['label' => '测试222', 'url' => '#'],
                ['label' => '退出', 'url' =>['/site/logout']],
            ],
        ];
    }

    echo Html::beginForm(['site/search'], 'get', ['class' => 'navbar-form navbar-left mt-10']);
    echo Html::textInput('search','',['class'=>'']);

    echo Html::endForm();

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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
