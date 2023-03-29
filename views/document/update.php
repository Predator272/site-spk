<?php

use yii\helpers\Html;

$this->title = 'Редактировать';
$this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
	<div class="card-body">
		<h1 class="card-title"><?= Html::encode($this->title) ?></h1>
		<?= $this->render('_form', compact('model')) ?>
	</div>
</div>