<?php

use common\components\UserComponent;
use yii\bootstrap\Nav;
use yii\helpers\Html;

?>
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <?php
                $guest = Yii::$app->user->isGuest;
                $menuItems = [
                    ['label' => 'Главная', 'url' => '/'],
                    ['label' => 'О Нас', 'url' => ['/main/main/page', 'view' => 'about']],
                    ['label' => 'Контакты', 'url' => ['/main/main/page', 'view' => 'contact']],
                    ['label' => 'Написать Нам', 'url' => ['/main/main/contact', 'view' => 'contact']],
                ];

                if ($guest) {
                    $menuItems[] = ['label' => 'Авторизация', 'url' => '#', 'linkOptions' => ['data-target' => '#loginpop', 'data-toggle' => "modal"]];
                } else {
                    $menuItems[] = ['label' => 'Менеджер Обьявлений', 'url' => ['/cabinet/advert']];
                    ?>

                    <div class="navbar-custom-menu navbar-nav navbar-right nav">

                        <ul class="nav navbar-nav">

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">
                                        <?= Yii::$app->user->identity->username ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <p>
                                            <?php if (!empty(UserComponent::getUserImage(Yii::$app->user->id))) { ?>
                                                <img src="<?= UserComponent::getUserImage(Yii::$app->user->id) ?>" class="img-circle"/><br>
                                            <?php } ?>
                                            <?= Yii::$app->user->identity->username ?>
                                        </p>
                                    </li>

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">

                                            <?= Html::a(
                                                'Менеджер Обьявлений',
                                                ['/cabinet/advert'],
                                                ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                            ) ?>
                                            <?= Html::a(
                                                'Настройки',
                                                ['/cabinet/default/settings'],
                                                ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                            ) ?>
                                            <?= Html::a(
                                                'Изменить пароль',
                                                ['/cabinet/default/change-password'],
                                                ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                            ) ?>
                                            <?= Html::a(
                                                'Выйти из личного кабинета',
                                                ['/site/logout'],
                                                ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                            ) ?>

                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <!-- User Account: style can be found in dropdown.less -->

                        </ul>
                    </div>
                    <?php
                }
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                ]); ?>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->

<div class="container">
    <!-- Header Starts -->
    <div class="header">
        <a href="/"><img src="/images/logo.png" alt="Realestate"></a>
    </div>
    <!-- #Header Starts -->
</div>