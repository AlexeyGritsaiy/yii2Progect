<?php
use yii\bootstrap\ActiveForm;
?>
<div class="row register">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
        <?php $form = ActiveForm::begin([
                'enableClientValidation' => false,
                'enableAjaxValidation' => false,
        ]); ?>

        <?= $form->field($model, 'username'); ?>
        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'password')->passwordInput(); ?>
        <?= $form->field($model, 'repassword')->passwordInput(); ?>

        <?= yii\helpers\Html::submitButton('Регистрация', ['class' => 'btn btn-success']); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>