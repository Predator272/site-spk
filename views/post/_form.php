<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'title')->textInput(['autofocus' => true, 'maxlength' => true]) ?>
<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>