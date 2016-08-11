<?php

namespace app\modules\zhihu\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `forum` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            "path" => \Yii::$app->basePath."/test.txt",
        ]);
    }
}
