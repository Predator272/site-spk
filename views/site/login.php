<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
	<div class="card-body">
		<h1 class="card-title"><?= Html::encode($this->title) ?></h1>
		<?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
		<?= $form->field($model, 'password')->passwordInput() ?>
		<?= $form->field($model, 'rememberMe')->checkbox() ?>
		<?= Html::submitButton('Войти', ['class' => 'btn btn-success']) ?>
		<?php ActiveForm::end(); ?>
	</div>
</div>