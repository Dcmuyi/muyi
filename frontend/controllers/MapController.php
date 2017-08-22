<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/8/22
 * Time: 10:20
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * 高德地图
 * Class MapController
 * @package frontend\controllers
 */
class MapController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }

    public function actionHome()
    {
        return $this->render('home', [

        ]);
    }
}