<?php
/**
 * Created by PhpStorm.
 * User: macalyou
 * Date: 2016/7/12
 * Time: 23:24
 */

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<h1>Countries</h1>
<ul>
    <?php foreach ($countries as $country): ?>
        <li>
            <?= Html::encode("{$country->name} ({$country->code})") ?>:
            <?= $country->population ?>
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
