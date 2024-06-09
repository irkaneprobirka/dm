<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;

/**
 * mfc-panel module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => fn() => Yii::$app->user->identity->isAdmin,
                    ],
                    [
                        'controllers' => ['mfc-panel/login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    'denyCallback' => fn() => Yii::$app->response->redirect('/'),
                ],
            ],
        ];
    }
}
