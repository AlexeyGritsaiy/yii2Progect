<?php
return [
    'name' => 'Покупка,Продажа и Аренда',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => require ((__DIR__)."/db.php"),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'appendTimestamp' => true,
            'linkAssets' => true,
            'forceCopy' => false,
        ],
    ],
];
