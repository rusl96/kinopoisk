<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

Yii::$container->set('frontend\widgets\CommentView', [
    'childrenMethod' => 'comments',
    'createdByMethod' => 'createdBy',
    'userNameColumn' => 'username',
    'avatarColumnName' => 'image_url',
    'createdAtColumnName' => 'created_at',
    'contentColumn' => 'content',
    'idColumn' => 'id',
    'parentIdColumn' => 'parent_id',]);

Yii::$container->set('frontend\widgets\PromoView', [
    'classname' => 'Film',
    'amountOfPromos' => 5,
    ]);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\entities\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<alias:\w+>' => 'site/<alias>',
                'film/index' => 'film/index',
                'film/newcomment/<filmId:\d+>'=>'film/newcomment',
                'film/changecomment/<filmId:\d+>-<commentId:\d+>'=>'film/changecomment',
                'film/commenttocomment/<filmId:\d+>'=>'film/commenttocomment',
                'film/<slug:[\w\-]+>'=>'film/view',
                'producer-actor/index' => 'producer-actor/index',
                'producer-actor/newcomment/<producerActorId:\d+>'=>'producer-actor/newcomment',
                'producer-actor/changecomment/<producerActorId:\d+>-<commentId:\d+>'=>'producer-actor/changecomment',
                'producer-actor/commenttocomment/<producerActorId:\d+>'=>'producer-actor/commenttocomment',
                'producer-actor/<slug:[\w\-]+>'=>'producer-actor/view',
                'genre/index' => 'genre/index',
                'genre/<slug:[\w\-]+>'=>'genre/view',
            ],
        ],
    ],
    'params' => $params,
];
