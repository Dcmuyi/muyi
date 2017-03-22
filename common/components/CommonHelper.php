<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/2/6
 * Time: 10:18
 */
namespace common\components;

use Yii;

class CommonHelper
{
    /**
     * 生成随机字符串
     * @param $len
     * @return string
     */
    public static function randomString($len)
    {
        return Yii::$app->getSecurity()->generateRandomString($len);
    }

    /**
     * 设置提示信息
     * error,danger,success,info,warning
     * @param $type
     * @param $message
     */
    public static function setFlash($type, $message)
    {
        Yii::$app->session->setFlash($type, $message);
    }

    /**
     * 返回ajax请求，成功消息内容
     * @param $data
     */
    public static function ajaxSuccess($data)
    {
        Yii::$app->end(json_encode($data));
    }

    /**
     * 获取分页offset
     * @param $page
     * @param $pageSize
     * @return bool|int
     */
    public static function getOffset($page, $pageSize)
    {
        $offset = ($page-1) * $pageSize;

        return $offset < 0 ? 0 : $offset;
    }

    /**
     * 友好时间显示
     * @param $sTime
     * @param bool $showSecond
     * @return false|string
     */
    public static function friendlyDate($sTime, $showSecond=false)
    {
        if (empty($sTime)) {
            return 'N久之前';
        }

        //sTime=源时间，cTime=当前时间，dTime=时间差
        $cTime      =   time();
        $dTime      =   $cTime - $sTime;
        $dDay     =   intval($dTime/3600/24);

        //normal：n秒前，n分钟前，n小时前，日期
        if( $dTime < 60 ) {
            return "刚刚";
        } elseif( $dTime < 3600 ) {
            return intval($dTime/60)."分钟前";
        } elseif( $dTime >= 3600 && $dDay == 0) {
            return intval($dTime/3600)."小时前";
        } elseif ($dDay > 0 && $dDay < 3) {
            return $dDay.'天前';
        } else {
            return $showSecond ? date("Y-m-d H:i:s",$sTime) : date("Y-m-d",$sTime);
        }
    }
}