<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\Subscribe;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ValidateController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get', 'post'],
                    'subscribe' => ['get', 'post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionSubscribe()
    {
        $model = new Subscribe();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}