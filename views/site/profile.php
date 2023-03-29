<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
	<ul class="list-group list-group-flush">
		<li class="list-group-item p-3">
			<h1 class="card-title"><?= Yii::$app->user->identity->username ?></h1>
			<?php if (Yii::$app->user->identity->isAdmin) : ?>
				<p class="card-subtitle text-muted">Администратор</p>
			<?php endif; ?>
		</li>
		<li class="list-group-item p-3">
			<h1 class="card-title">Редактировать</h1>
			<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'passwordConfirm')->passwordInput(['maxlength' => true]) ?>
			<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
			<?php ActiveForm::end(); ?>
		</li>
	</ul>
</div>