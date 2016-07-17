<?php

namespace app\modules\forum\controllers;

use yii\web\Controller;

/**
 * Default controller for the `forum` module
 */
class DefaultController extends Controller
{
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
        return $this->render("forumInfo");
    }

    public function actionDownload() {
        return \Yii::$app->response->sendFile(\Yii::$app->basePath."/test.txt");
    }
}
