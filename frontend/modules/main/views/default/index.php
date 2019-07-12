<?php

use frontend\components\Common;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div id="slider" class="sl-slider-wrapper">

    <div class="sl-slider">

        <?php foreach ($result_general as $row): ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25"
                 data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="bg-img" style="background-image: url('<?= Common::getImageAdvert($row)[0] ?>')"></div>
                    <h2>
                        <a href="<?= Common::getUrlAdvert($row) ?>">
                            <?= Common::getTitleAdvert($row) ?>
                        </a>
                    </h2>
                    <blockquote>
                        <p class="location"><span class="glyphicon glyphicon-map-marker"></span> <?= $row['address'] ?>
                        </p>
                        <p><?= Common::substr($row['description']) ?></p>
                        <cite>$ <?= $row['price'] ?></cite>
                    </blockquote>
                </div>
            </div>

        <?php endforeach; ?>

    </div><!-- /sl-slider -->


    <nav id="nav-dots" class="nav-dots">
        <?php
        if ($count_general >= 1):
            ?>
            <span class="nav-dot-current"></span>
        <?php
        endif;
        ?>

        <?php
        if ($count_general = 5):
            foreach (range(2, $count_general) as $line):
                ?>
                <span></span>
            <?php
            endforeach;
        endif;
        ?>
    </nav>

</div><!-- /slider-wrapper -->
</div>


<div class="banner-search">
    <div class="container">
        <!-- banner -->
        <h3>Покупка,Продажа и Аренда</h3>
        <div class="searchbar">
            <div class="row">
                <?= Html::beginForm(Url::to('main/main/find/'), 'get') ?>
                <div class="col-lg-6 col-sm-6">
                    <?= Html::textInput('property', '', ['class' => 'form-control']) ?>
                    <div class="row">
                        <div class="col-lg-3 col-sm-4">
                            <?= Html::dropDownList('price', '', [
                                '150000-200000' => '$150,000 - $200,000',
                                '200000-250000' => '$200,000 - $250,000',
                                '250000-300000' => '$250,000 - $300,000',
                                '300000' => '$300,000 - и более',
                            ], ['class' => 'form-control', 'prompt' => 'Цена']) ?>
                        </div>
                        <div class="col-lg-3 col-sm-4">

                            <?= Html::dropDownList('apartment', '', [
                                'Квартира',
                                'Дом',
                                'Офисное помещение',
                            ], ['class' => 'form-control', 'prompt' => 'Тип']) ?>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                    <?= Html::endForm() ?>

                </div>
                <?php
                if (Yii::$app->user->isGuest):
                    ?>
                    <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                        <p>Присоединяйтесь сейчас и получайте обновления со всеми предложениями недвижимости.</p>
                        <button class="btn btn-info" data-toggle="modal" data-target="#loginpop">Авторизация</button>
                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="properties-listing spacer"><a href="/adverts/all" class="pull-right viewall">Все Обьявления</a>
        <h2>Недавно добавленные</h2>
        <div id="owl-example" class="owl-carousel">

            <?php
            foreach ($featured as $row):
                ?>

                <div class="properties">
                    <div class="image-holder"><img src="<?= Common::getImageAdvert($row)[0] ?>" class="img-responsive"
                                                   alt="properties"/>
                        <div class="status <?= ($row['sold']) ? 'sold' : 'new' ?>"><?= Common::getType($row) ?></div>
                    </div>
                    <h4><a href="<?= Common::getUrlAdvert($row) ?>"><?= Common::getTitleAdvert($row) ?></a></h4>
                    <p class="price">Цена: $<?= $row['price'] ?></p>
                    <div class="listing-detail">
                        <span data-toggle="tooltip" data-placement="bottom"
                              data-original-title="Bed Room"><?= $row['bedroom'] ?></span>
                        <span data-toggle="tooltip" data-placement="bottom"
                              data-original-title="Living Room"><?= $row['livingroom'] ?></span>
                        <span data-toggle="tooltip" data-placement="bottom"
                              data-original-title="Parking"><?= $row['parking'] ?></span>
                        <span data-toggle="tooltip" data-placement="bottom"
                              data-original-title="Kitchen"><?= $row['kitchen'] ?></span>
                        <!--                        <ul class="home-in">-->
                        <!--                            <li><span><i class="fa fa-home"></i> 20,000 Acres</span></li>-->
                        <!--                            <li><span><i class="fa fa-bed"></i> 3 Bedrooms</span></li>-->
                        <!--                            <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>-->
                        <!--                        </ul>-->
                    </div>
                    <a class="btn btn-primary" href="<?= Common::getUrlAdvert($row) ?>">Подробнее</a>
                </div>

            <?php
            endforeach;
            ?>

        </div>
    </div>
    <div class="spacer">
        <div class="row">
            <div class="col-lg-6 col-sm-9 recent-view">
                <h3>О Нас</h3>
                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                    Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in
                    their exact original form, accompanied by English versions from the 1914 translation by H.
                    Rackham.<br><a href="/about">Читать всё</a></p>

            </div>
            <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
                <h3>Рекомендованые обьявления</h3>
                <div id="myCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <?php
                        if ($recommend_count >= 1):
                            ?>
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <?php
                        endif;
                        ?>

                        <?php
                        if ($recommend_count = 5):
                            foreach (range(1, $recommend_count - 1) as $count):
                                ?>
                                <li data-target="#myCarousel" data-slide-to="<?= $count ?>"></li>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">

                        <?php
                        $i = 0;
                        foreach ($recommend as $rec):
                            ?>
                            <div class="item <?= ($i == 0) ? 'active' : '' ?>">
                                <div class="row">
                                    <div class="col-lg-4"><img src="<?= Common::getImageAdvert($rec)[0] ?>"
                                                               class="img-responsive" alt="properties"/></div>
                                    <div class="col-lg-8">
                                        <h5>
                                            <a href="<?= Common::getUrlAdvert($rec) ?>"><?= Common::getTitleAdvert($rec) ?></a>
                                        </h5>
                                        <p class="price">$<?= $rec['price'] ?></p>
                                        <a href="<?= Common::getUrlAdvert($rec) ?>" class="more">Подробнее</a></div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        endforeach;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>