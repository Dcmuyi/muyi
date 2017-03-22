<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=45.63.121.236;dbname=test',
            'username' => 'zydc',
            'password' => 'ydch920107',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport', //使用的类
                'host' => 'smtp.qq.com', //邮箱服务一地址
                'username' => '773724313@qq.com',//邮箱地址，发送的邮箱
                'password' => 'korvrzxwncznbajh',  //自己填写邮箱密码
                'port' => '465',  //服务器端口
                'encryption' => 'ssl', //加密方式
            ],

            'messageConfig'=>[
                'charset'=>'UTF-8', //编码
                'from' => ['773724313@qq.com' => '论坛']  //邮件里面显示的邮件地址和名称
            ],
        ],
    ],
];
