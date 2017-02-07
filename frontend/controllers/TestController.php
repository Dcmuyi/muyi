<?php

namespace frontend\controllers;

use common\components\CommonHelper;
use Yii;

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
            print_r(Yii::$app->request->post());die;
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