<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
	<ul class="list-group list-group-flush">
		<li class="list-group-item p-3">
			<h1 class="card-title"><?= Html::encode($this->title) ?></h1>
			<p class="card-subtitle text-muted">Дата создания: <?= Html::encode($model->onCreate) ?></p>
			<?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin) : ?>
				<div class="btn-group w-100 mt-3">
					<a href="<?= Url::to(['update', 'id' => $model->id]) ?>" class="btn btn-outline-success">Редактировать</a>
					<a href="<?= Url::to(['delete', 'id' => $model->id]) ?>" class="btn btn-outline-danger" data-method="post" data-confirm="<?= Yii::t('yii', 'Are you sure you want to delete this item?') ?>">Удалить</a>
				</div>
			<?php endif; ?>
		</li>
		<li class="list-group-item p-3">
			<a href="<?= Url::to(['download', 'id' => $model->id]) ?>" class="btn btn-success">Скачать <?= $model->name ?> (<?= Yii::$app->formatter->asShortSize($model->size) ?>)</a>
		</li>
	</ul>
</div>