<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/2/6
 * Time: 10:18
 */
namespace common\components;

use Yii;

class CommonHelper{
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
}