<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Информация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
	<ul class="list-group list-group-flush">
		<li class="list-group-item p-3">
			<h1 class="card-text"><?= Html::encode($this->title) ?></h1>
			<?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin) : ?>
				<a href="<?= Url::to(['create']) ?>" class="btn btn-success d-block">Создать</a>
			<?php endif; ?>
		</li>
		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'layout' => "{items}\n{pager}",
			'options' => ['tag' => false],
			'itemOptions' => ['class' => 'list-group-item p-3'],
			'emptyTextOptions' => ['class' => 'text-center p-3'],
			'itemView' => '_list',
			'pager' => [
				'maxButtonCount' => 5,
				'options' => ['class' => 'pagination justify-content-center p-3'],
				'disabledListItemSubTagOptions' => ['class' => 'page-link disabled'],
				'linkContainerOptions' => ['class' => 'page-item'],
				'linkOptions' => ['class' => 'page-link'],
				'firstPageLabel' => '&laquo;',
				'prevPageLabel' => '&lsaquo;',
				'nextPageLabel' => '&rsaquo;',
				'lastPageLabel' => '&raquo;',
			],
		]) ?>
	</ul>
</div>