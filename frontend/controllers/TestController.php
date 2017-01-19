<?php

namespace frontend\controllers;

use Yii;

/**
 * Class TestController
 * @package backend\controllers
 */
class TestController extends CommonController
{
    public function actionTest()
    {
        echo 213;

        return $this->render('test');
    }

    public function actionTestOne()
    {
        return $this->render('testOne');
    }
}