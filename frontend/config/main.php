<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [

    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'main',
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
        'cabinet' => [
            'class' => 'app\modules\cabinet\Module',
        ],
    ],
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'alexey.gritsaiy@gmail.com',
                'password' => 'Puma321Puma',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'common' => [
            'class' => '\frontend\components\Common'
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => '/main/main/login'
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/<view:[a-zA-Z0-9-]+>' => 'main/main/page',
                'adverts/all' => 'main/main/blog',

                'register/' => 'main/main/register/',
                'login/' => 'site/login',

                'view-advert/id=<id:\d+>' => 'main/main/view-advert',
                'cabinet/<action_cabinet:(settings|change-password)>' => 'cabinet/default/<action_cabinet>'
            ],
        ],
    ],
    'params' => $params,
];
