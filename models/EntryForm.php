<?php
/**
 * Created by PhpStorm.
 * User: macalyou
 * Date: 2016/7/7
 * Time: 23:35
 */

namespace app\models;

use Yii;
use Yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }

}