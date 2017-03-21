<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_review".
 *
 * @property int $id
 * @property int $article_id 文章id
 * @property int $user_id
 * @property int $parent_id 回复id
 * @property string $content 回复内容
 * @property int $created_at
 * @property int $updated_at
 */
class ArticleReviewModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id', 'parent_id', 'created_at', 'updated_at'], 'integer'],
            ['content', 'filter', 'filter' => 'trim'],
            [['content'], 'required'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => '文章id',
            'user_id' => '回复人',
            'parent_id' => '回复id',
            'content' => '回复内容',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
