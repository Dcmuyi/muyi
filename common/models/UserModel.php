<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username 昵称
 * @property string $pic 头像
 * @property string $email 邮箱
 * @property string $auth_key 免登陆秘钥
 * @property string $password_hash 密码
 * @property string $password_reset_token 重置密码秘钥
 * @property string $signature 个性签名
 * @property int $group_id 用户群
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class UserModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['group_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'pic', 'email', 'password_hash', 'password_reset_token', 'signature'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '昵称',
            'pic' => '头像',
            'email' => '邮箱',
            'auth_key' => '免登陆秘钥',
            'password_hash' => '密码',
            'password_reset_token' => '重置密码秘钥',
            'signature' => '个性签名',
            'group_id' => '用户群',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
