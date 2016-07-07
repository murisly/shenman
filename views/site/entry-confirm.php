<?php
/**
 * Created by PhpStorm.
 * User: macalyou
 * Date: 2016/7/8
 * Time: 0:01
 */

use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>