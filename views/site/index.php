<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\Carousel;

$this->title = Yii::$app->name;
?>
<div class="card">
	<?= Carousel::widget([
		'items' => [
			['content' => Html::img(['/img/banner-0.png'], ['class' => 'd-block w-100'])],
			['content' => Html::img(['/img/banner-1.png'], ['class' => 'd-block w-100'])],
		],
		'options' => ['class' => 'card-img-top d-none d-md-block']
	]) ?>
	<div class="card-body">
		<h1 class="card-title text-center">О нас</h1>
		<p class="card-text">САДОВОДЧЕСКИЙ ПОТРЕБИТЕЛЬСКИЙ КООПЕРАТИВ ИНВАЛИДОВ "РУЧЕЕК" находится в черте г. Феодосии на расстоянии 1,5-2 км от центральных улиц.</p>
		<p class="card-text">Дата регистрации: 22 октября 1993 года.</p>
		<p class="card-text">На землях размером 20,13 га расположено более 200 участков.</p>
		<p class="card-text">Имеется разветвленная электрическая сеть и водоснабжение питьевой водой.</p>
	</div>
</div>