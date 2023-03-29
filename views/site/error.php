<?php

use yii\bootstrap5\Html;

$this->title = $name;
?>
<div class="text-center">
	<h1><?= Html::encode($this->title) ?></h1>
	<p><?= nl2br(Html::encode($message)) ?></p>
</div>