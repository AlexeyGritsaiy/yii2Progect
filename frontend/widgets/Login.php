<?php

namespace frontend\widgets;

use common\models\LoginForm;
use yii\bootstrap\Widget;

class Login extends Widget
{
    public function run()
    {
        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            if ($referer = \Yii::$app->request->referrer) {
                \Yii::$app->response->redirect($referer);
            } else {
                \Yii::$app->controller->goBack();
            }
        }

        return $this->render("login", ['model' => $model]);
    }
}