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
    public function actionInPolygon()
    {
        $polygon = [
            [116.373581, 39.923718],
            [116.411047, 39.924599],
            [116.411561, 39.907695],
            [116.411819, 39.892715],
            [116.402292, 39.892353],
            [116.394202, 39.890525],
            [116.385426, 39.889488],
            [116.374396, 39.888994],
        ];

        $spot = [116.330851, 39.917415];

        $in = self::polygon($polygon, $spot);

        var_dump($in);die;
    }

    /**
     * $spot是否在多边形$polygon内
     * @param array $polygon
     * @param $spot
     * @return bool
     */
    public function polygon($polygon = [], $spot)
    {
        $x = $spot['0'];
        $y = $spot['1'];
        $c = false;
        $l = count($polygon) - 1;
        for($i = 0, $j = $l; $i < $l; $j = $i++) {
            if(($polygon[$i]['1'] > $y) != ($polygon[$j]['1'] > $y) && ($x < ($polygon[$j]['0'] - $polygon[$i]['0']) * ($y - $polygon[$i]['1']) / ($polygon[$j]['1'] - $polygon[$i]['1']) + $polygon[$i]['0'])) {
                $c = !$c;
            }
        }
        return $c;
    }

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