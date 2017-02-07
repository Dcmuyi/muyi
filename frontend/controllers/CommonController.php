<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Class CommonController
 * @package app\components\controller
 */
class CommonController extends Controller
{
    public $enableCsrfValidation = false;
    public $returnUrlParam = '__returnUrl';
    /**
     * 初始化
     */
    public function init()
    {
        parent::init();

        /* 游客跳转至登陆页面 */
        if (Yii::$app->user->getIsGuest() === TRUE)
        {
            Yii::$app->session->set($this->returnUrlParam, Yii::$app->request->absoluteUrl);

            $this->redirect(Url::to([Yii::$app->user->loginUrl]))->send();

            Yii::$app->end();
        }
    }
}