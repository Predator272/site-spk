<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>
<h2 class="card-text text-nowrap text-truncate text-success"><a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="text-success"><?= Html::encode($model->title) ?></a></h2>