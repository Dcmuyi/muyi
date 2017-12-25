<?php
namespace backend\controllers;

use common\models\UserModel;
use Yii;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\Response;

/**
 * Class BaseController
 * @package frontend\controllers
 */
class BaseController extends Controller
{
    public $enableCsrfValidation = false;

    public function init()
    {
        parent::init();

        /* 记录用户最后活跃时间 */
        if (Yii::$app->user->getIsGuest() !== TRUE)
        {
            UserModel::updateAll(['last_active_at' => time()], ['id' => Yii::$app->user->id]);
        }
    }

    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    "imageUrlPrefix"  => "",//图片访问路径前缀
                    "imagePathFormat" => "/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}", //上传保存路径
                    'scrawlPathFormat' => "/upload/scraw/{yyyy}{mm}{dd}/{time}{rand:6}", //涂鸦上传保存路径
                    "imageRoot" => Yii::getAlias("@webroot"),
            ],
        ]
    ];

    }
}