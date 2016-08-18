<?php

namespace app\controllers;

use app\common\helper\SetTest;
use app\models\Country;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($message = 'hello!') {
        $message = Yii::$app->request->bodyParams;
        $test = Yii::$app->session;
        return $this->render('say', [
            'message' => json_encode($message),
            'test' => json_encode($test),
        ]);
    }

    public function actionEntry() {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionShow() {
        return "show";
    }


    public function actionEntryTest() {
        $model = new EntryForm(['scenario' => 'register']);
        $model['name'] = "jam";
        $model['password'] = "123";

        return json_encode($model->attributes);

        if ($model->validate()) {
            return 'success';
        } else {
            return json_encode($model->errors);
        }

        // 快赋值
        //$model = new EntryForm();
        //$model = Yii::$app->request->post("EntryForm");

        // 返回所有属性
        // return json_encode($model->attributes);
    }

    public function actionSettest() {
        $test = new SetTest();
        $test->param2 = 3;

        return $test->param2;
    }

    public function actionCountry() {
        $item = new Country();
        $item->loadDefaultValues();

        $item->population = 5000;
        $item->name = 'japan';
        $item->save();

        return $item->population;
    }

    public function actionImage() {
        return $this->renderPartial("image.html");
    }

    public function actionLink() {
        return $this->renderPartial("link.html");
    }
}
