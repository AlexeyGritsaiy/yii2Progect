<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;

return [
    'definitions' => [
        GridView::class => function ($container, $params, $args) {
            return new GridView(ArrayHelper::merge([
                'tableOptions' => ['class' => 'box table table-bordered table-hover'],
                'layout' => "{items}\n{summary}\n{pager}",
            ], $args));
        },
    ],
];