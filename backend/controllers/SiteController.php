<?php
namespace backend\controllers;

use common\components\CommonHelper;
use common\models\ArticleContentModel;
use common\models\ArticleReviewModel;
use common\models\UserModel;
use Yii;
use common\models\ArticleModel;
use common\models\LoginForm;
use yii\base\Exception;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * 行为控制
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'create'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $category = Yii::$app->request->get('category');

        $query = $queryCount = ArticleModel::find()
            ->andFilterWhere(['category' => $category])
            ->asArray();

        $count = $queryCount->count();

        /* 分页 */
        $pages = new Pagination(['totalCount' =>$count]);

        //统计
        $dataNew = ArticleModel::find()
            ->select(['count(1)', 'category'])
            ->groupBy('category')
            ->indexBy('category')
            ->orderBy('category ASC')
            ->column();
        $dataNew['0'] = array_sum($dataNew);

        ksort($dataNew);

        $result = $query->offset($pages->offset)->limit($pages->limit)->orderBy('id DESC')->all();

        //用户信息
        $userIdList = array_column($result, 'user_id');
        $userList = CommonHelper::getUserList($userIdList);

        //muyi's info
        $userId = Yii::$app->user->id ?? 1;
        $user = UserModel::findOne($userId);

        return $this->render('index', [
            'result' => $result,
            'userList' => $userList,
            'user' => $user,
            'chart' => $dataNew,
            'pages' => $pages
        ]);
    }

    public function actionCreate()
    {
        $model = new ArticleModel();
        $contentModel = new ArticleContentModel();

        if (Yii::$app->request->getIsPost()) {
            $userId = Yii::$app->user->id;

            //事物
            $tran = Yii::$app->db->beginTransaction();
            try {
                $model->load(Yii::$app->request->post());
                $model->user_id = $userId;

                if (!$model->save()) {
                    throw new Exception('添加文章失败');
                }

                $contentModel->load(Yii::$app->request->post());
                $contentModel->article_id = $model->id;

                if (!$contentModel->save()) {
                    throw new Exception('添加文章内容失败');
                }

                CommonHelper::setFlash('success', '添加成功');

                $tran->commit();
                $this->redirect('index.html')->send();

            } catch (Exception $e) {
                $tran->rollBack();
                CommonHelper::setFlash('error', $e->getMessage());
            }
        }

        return $this->render('create', [
            'model' => $model,
            'contentModel' => $contentModel
        ]);
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $article = ArticleModel::findOne($id);
        $content = ArticleContentModel::findOne($id);
        $user = UserModel::findOne($article->user_id);

        //没有信息跳转404
        if (empty($article) || empty($content)) {
            $this->redirect(['site/error'])->send();
        }

        //回复model
        $reviewModel = new ArticleReviewModel();

        if (Yii::$app->request->post()) {
            $reviewModel->load(Yii::$app->request->post());

            $reviewModel->article_id = $id;
            $reviewModel->user_id = Yii::$app->user->id;

            if ($reviewModel->save()) {
                $article->review_times += 1;

                $article->save();
            }

            $this->redirect(Url::current(['#'=>'review-list']))->send();
        }

        //浏览次数+1
        $article->visit_times += 1;
        $article->save();

        $reviewList = ArticleReviewModel::find()
            ->select(['article_review.*', 'user.username', 'user.pic_small'])
            ->innerJoin(UserModel::tableName(), 'user.id = article_review.user_id')
            ->andWhere(['article_id' => $id])
            ->orderBy('article_review.id DESC')
            ->asArray()
            ->all();

        return $this->render('view', [
            'model' => $article,
            'content' => $content,
            'user' => $user,
            'reviewList' => $reviewList,
            'reviewModel' => $reviewModel,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
