<?php

namespace common\components;

use OSS\Core\OssException;
use OSS\OssClient;
use Yii;

class Oss{
    private $ossClient;
    private $bucket;

    public function __construct()
    {
        $accessKeyId = Yii::$app->params['oss']['OSS_ACCESS_ID'];
        $accessKeySecret = Yii::$app->params['oss']['OSS_ACCESS_KEY'];
        $endpoint = Yii::$app->params['oss']['OSS_ENDPOINT'];
        $this->bucket = Yii::$app->params['oss']['OSS_BUCKET'];

        try {
            $this->ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint, true);
        } catch (OssException $e) {
            $this->ossClient = null;
        }
    }

    public function upload($ossKey, $filePath)
    {
        return $this->ossClient->uploadFile($this->bucket,$ossKey, $filePath);
    }

    /**
     * 删除指定文件
     * @param $object 被删除的文件名
     * @return bool   删除是否成功
     */
    public function delete($object)
    {
        $res = false;
        if ($this->ossClient->deleteObject($this->bucket, $object)){ //调用deleteObject方法把服务器文件上传到阿里云oss
            $res = true;
        }

        return $res;
    }
}