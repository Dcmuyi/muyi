<?php
/**
 * Created by PhpStorm.
 * User: huxiao
 * Date: 2016/7/12
 * Time: 16:04
 */
namespace backend\controllers;

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