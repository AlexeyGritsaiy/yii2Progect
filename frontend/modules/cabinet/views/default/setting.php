<?php

use common\components\UserComponent;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="advert-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= Html::img(UserComponent::getUserImage(Yii::$app->user->id), ['width' => 200]) ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'email') ?>

    <?= Html::label('Фото профиля') ?>

    <?= Html::fileInput('avatar') ?>

    <br>
    <br>

    <?= Html::submitButton('Сохранить изменения',
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php ActiveForm::end() ?>
</div>