<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div id="loginpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Вход в личный кабинет</h4>

                    <?php $form = ActiveForm::begin([
                        'enableAjaxValidation' => true,
                        'validationUrl' => Url::to(['/validate/index']),
                    ]); ?>

                    <?= $form->field($model, 'username') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <?= Html::submitButton('Авторизация', ['class' => 'btn btn-success']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-sm-6">
                    <h4>Регистрация нового пользователя</h4>
                    <p>
                        Присоединяйтесь сегодня и будьте в курсе всех сделок с недвижимостью, происходящих вокруг.</p>
                    <button type="submit" class="btn btn-info" onclick="window.location.href='<?= Url::to('main/main/register/') ?>'">Регистрация</button>
                </div>

            </div>
        </div>
    </div>
</div>