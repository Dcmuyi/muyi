<?php
namespace frontend\controllers;

use common\models\UserModel;
use Yii;
use yii\web\Controller;

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
}