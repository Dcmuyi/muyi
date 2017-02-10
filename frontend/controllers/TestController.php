<?php

namespace frontend\controllers;

use common\components\CommonHelper;
use Yii;
use yii\bootstrap\Html;

/**
 * Class TestController
 * @package backend\controllers
 */
class TestController extends CommonController
{
    public function actionTest()
    {
        if (Yii::$app->request->getIsPost())
        {
            $content = Html::encode(Yii::$app->request->post('content'));

        }

        return $this->render('test');
    }

    public function actionTestOne()
    {
        Yii::$app->view->title = '测试';
        CommonHelper::setFlash('info', 'test');
        return $this->render('testOne');
    }
}