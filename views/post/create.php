<?php

use yii\helpers\Html;

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Объявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
	<div class="card-body">
		<h1 class="card-title"><?= Html::encode($this->title) ?></h1>
		<?= $this->render('_form', compact('model')) ?>
	</div>
</div>