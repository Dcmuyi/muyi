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
        return $this->render('test');
    }

    public function actionTestOne()
    {
        Yii::$app->view->title = '测试';
        CommonHelper::setFlash('info', 'test');
        return $this->render('testOne');
    }

    public function actionTestEditor()
    {
        Yii::$app->view->title = '测试';
        CommonHelper::setFlash('info', 'test');
        return $this->render('testEditor');
    }
}