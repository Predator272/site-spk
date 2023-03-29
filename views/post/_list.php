<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>
<h2 class="card-title text-nowrap text-truncate text-success"><a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="text-success"><?= Html::encode($model->title) ?></a></h2>
<p class="card-subtitle text-muted">Дата создания: <?= Html::encode($model->onCreate) ?></p>
<p class="card-text text-nowrap text-truncate"><?= Html::encode($model->text) ?></p>