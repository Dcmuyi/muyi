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
            margin-top: -8px;
            margin-bottom: -12px;
        }
        .user-pic {
            width: 36px;
            height: 36px;
            margin-top: -13px;
            margin-bottom: -12px;
        }

        h1 {
            font-size: 18px;
            font-weight: bold;
        }

        .row {
            margin: 0 -10px;
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
        ['label' => '富文本', 'url' => ['/test/test']],
        ['label' => '上传图片', 'url' => ['/test/test-one']],
        ['label' => '<span class="glyphicon glyphicon-user"></span>', 'url' => ['/site/index'], 'encode'=>false],
        ['label' => '<i class="fa fa-bell"></i>', 'url' => ['/site/index'], 'encode'=>false],
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left nav'],
        'items' => $menuItemsLeft,
        'encodeLabels' => false,
    ]);

    $menuItems[] = ['label' => '<li class="fa fa-bell"></li>', 'url' => ['/site/signup']];

    if (Yii::$app->user->isGuest)
    {
        $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    }
    else
    {
        $menuItems[] = [
            'label' => '<image class="user-pic" src="https://www.zydc1104.top/up/pic/2017/02/22/0AQV50zcz3.jpg" />',
//            'label' => Yii::$app->user->identity->username,
            'items' => [
                ['label' => '测试111', 'url' => '#'],
                '<li class="divider"></li>',
                ['label' => '测试222', 'url' => '#'],
                ['label' => '退出', 'url' =>['/site/logout']],
            ],
        ];
    }

    echo Html::beginForm(['site/search'], 'get', ['class' => 'navbar-form visible-lg-inline-block']);
    echo Html::textInput('q', '', ['class' => 'form-control phone-input', 'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}</div>',]);
    echo Html::button( '搜索', ['class' => 'form-control']);

    echo Html::endForm();

//    echo $form->field($model, 'username', [
//        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}</div>',
//        'inputOptions' => [
//            'placeholder' => $model->getAttributeLabel('username'),
//        ],
//    ]);

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
