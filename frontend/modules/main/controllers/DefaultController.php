<?php

namespace app\modules\main\controllers;

use yii\db\Query;
use yii\web\Controller;
use frontend\components\Common;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "/bootstrap";
        $query = new Query();
        $query_advert = $query->from('advert')->orderBy('id desc');
        $command = $query_advert->limit(5);
        $result_general = $command->all();
        $count_general = $command->count();

        $featured = $query_advert->limit(15)->all();
        $recommend_query = $query_advert->where("recommend= 1")->limit(5);
        $recommend = $recommend_query->all();
        $recommend_count = $recommend_query->count();

        return $this->render('index', [
            'result_general' => $result_general,
            'count_general' => $count_general,
            'featured' => $featured,
            'recommend' => $recommend,
            'recommend_count' => $recommend_count

        ]);
    }

    public function actionLoginData()
    {
        print \Yii::$app->user->identity->username;
    }
}