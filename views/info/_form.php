<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'title')->textInput(['autofocus' => true, 'maxlength' => true]) ?>
<?= $form->field($model, 'uploadedFile')->fileInput() ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>