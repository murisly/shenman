<?php

namespace app\modules\forum\controllers;

use simple_html_dom;
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

    public function actionForumInfo(){
        $html = new simple_html_dom();
        $html->load_file('http://www.baidu.com');
        return $this->render("forumInfo");
    }

    public function actionDownload() {
        return \Yii::$app->response->sendFile(\Yii::$app->basePath."/test.txt");
    }

    public function actionSmarty() {
        return $this->render('test.tpl', ['username' => 'Alex']);
    }
}
