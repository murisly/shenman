<?php
/**
 * Created by PhpStorm.
 * User: macalyou
 * Date: 2016/7/7
 * Time: 23:35
 */

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    /**
     * 实现的ArrayAccess接口可以以数组访问变量
     */

    public $name;
    public $email;
    public $password;

    const SCENARIOS_LOGIN = 'login';
    const SCENARIOS_REGISTER = "register";

    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            ['email', 'email'],
        ];
    }


    /**
     * 可以按照多语言来设置
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name'      => \Yii::t('app', 'Your name'),
            'email'     => \Yii::t('app', 'Your email address'),
            'password'  => \Yii::t('app', 'Password'),
        ];
    }


    public function scenarios()
    {
        $scenario = parent::scenarios();
        $scenario[self::SCENARIOS_LOGIN] = ['name', 'password'];
        $scenario[self::SCENARIOS_REGISTER] = ['name', 'password', 'email'];
        return $scenario;
    }

}