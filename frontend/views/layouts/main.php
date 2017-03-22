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
    <link rel="Shortcut Icon" id="web-icon" href="https://www.zydc1104.top/up/logo.png" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->params['webUrl'].'/static/site.css' ?>" rel="stylesheet">
    <script src="<?php echo Yii::$app->params['webUrl'].'/static/jquery-3.1.1.min.js' ?>"></script>

    <style>
        .header-logo {
            width: 36px;
            height: 36px;
            margin-top: 8px;
            margin-bottom: -12px;
        }
        .user-pic {
            width: 36px;
            height: 36px;
            margin-top: -13px;
            margin-bottom: -12px;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<image class="header-logo" src="/up/logo.png" />',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top navbar',
        ],
    ]);

    $menuItemsLeft = [
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '文章', 'url' => ['/article/index']],
//        ['label' => '<span class="glyphicon glyphicon-user"></span>', 'url' => ['/site/index'], 'encode'=>false],
//        ['label' => '<i class="fa fa-bell"></i>', 'url' => ['/site/index'], 'encode'=>false],
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left nav'],
        'items' => $menuItemsLeft,
        'encodeLabels' => false,
    ]);

    if (Yii::$app->user->isGuest)
    {
        $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    }
    else
    {
        $menuItems[] = ['label' => '<i class="fa fa-bell"></i><span style="color: red"></span>', 'url' => ['/site/signup']];

        $menuItems[] = [
            'label' => '<image class="user-pic" src = '.Yii::$app->user->identity->pic_small.' />',
            'items' => [
                ['label' => '<i class="fa fa-user fa-fw"></i> 个人中心', 'url' => ['/user/info']],
                ['label' => '<i class="fa fa-camera fa-fw"></i> 修改头像', 'url' => ['/user/pic']],
                '<li class="divider"></li>',
                ['label' => '<i class="fa fa-list fa-fw"></i> 我的发布', 'url' => '#'],
                ['label' => '<i class="fa fa-star fa-fw"></i> 我的收藏', 'url' => '#'],
                '<li class="divider"></li>',
                ['label' => '<i class="fa fa-sign-out fa-fw"></i> 退出登陆', 'url' =>['/site/logout']],
            ],
        ];
    }

    //搜索框
    echo Html::beginForm(['site/search'], 'get', ['class' => 'navbar-form visible-lg-inline-block']);
    echo Html::textInput('keyword', '', ['class' => 'form-control phone-input']);
    echo Html::button( '搜索', ['class' => 'form-control']);

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
        <p class="pull-left">&copy; Mu Yi <?= '2016 - '.date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
