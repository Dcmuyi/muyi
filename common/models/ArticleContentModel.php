<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_content".
 *
 * @property int $article_id 文章id
 * @property string $content 内容
 * @property int $created_at
 * @property int $updated_at
 */
class ArticleContentModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'content'], 'required'],
            [['article_id', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string', 'min' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => '文章id',
            'content' => '内容',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
