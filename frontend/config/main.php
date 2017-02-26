<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'name' => 'test',

    'controllerNamespace' => 'frontend\controllers',

    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',//yii2-admin的导航菜单
        ]
    ],

    'components' => [
        'request' => [
            'csrfParam' => '_csrf-test',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'identityCookie' => ['name' => '_identity-test', 'httpOnly' => true],
            'enableAutoLogin' => true,
            'loginUrl'=> '/site/login',
        ],

        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-test',
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],

    'aliases' => [
        '@mdm/admin' => '@app/extensions/mdmsoft/yii2-admin',
        // for example: '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
    ],

    'params' => $params,
];
