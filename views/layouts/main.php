<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
	<?php $this->beginBody() ?>
	<header id="header">
		<?php NavBar::begin([
			'brandLabel' => Html::img(['/favicon.ico'], ['class' => 'd-inline-block me-2', 'height' => 24]) . Html::tag('div', Yii::$app->name, ['class' => 'd-none d-sm-inline-block']),
			'brandOptions' => ['class' => 'd-inline-flex align-items-center'],
			'brandUrl' => Yii::$app->homeUrl,
			'options' => ['class' => 'navbar-expand-md navbar-light bg-white border-bottom']
		]); ?>
		<?= Nav::widget([
			'options' => ['class' => 'navbar-nav ms-auto'],
			'items' => [
				['label' => 'Главная', 'url' => Yii::$app->homeUrl],
				['label' => 'Объявления', 'url' => ['/post/index']],
				['label' => 'Информация', 'url' => ['/info/index']],
				['label' => 'Документы', 'url' => ['/document/index']],
				['label' => 'Вход', 'url' => ['/site/login'], 'visible' => Yii::$app->user->isGuest === true],
				[
					'label' => isset(Yii::$app->user->identity->username) ? Yii::$app->user->identity->username : 'Unknown',
					'items' => [
						['label' => 'Профиль', 'url' => ['/site/profile']],
						['label' => 'Выход', 'url' => ['/site/logout'], 'linkOptions' => ['data' => ['method' => 'post']]],
					],
					'visible' => Yii::$app->user->isGuest === false
				],
			]
		]); ?>
		<?php NavBar::end(); ?>
	</header>
	<main id="main" class="flex-shrink-0">
		<div class="container py-3">
			<?php if (!empty($this->params['breadcrumbs'])) : ?>
				<?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs'], 'options' => ['class' => 'text-break']]) ?>
			<?php endif ?>
			<?= Alert::widget() ?>
			<?= $content ?>
		</div>
	</main>
	<footer class="mt-auto bg-white border-top">
		<div class="container py-3">
			<div class="row">
				<div class="col-auto">Связь с нами:</div>
			</div>
			<div class="row-auto">
				<a href="tel:+79787012076" class="text-success">+7 978 701-20-76</a>
			</div>
			<div class="row-auto">
				<a href="mailto:spk_streamlet@mail.ru" class="text-success">spk_streamlet@mail.ru</a>
			</div>
		</div>
	</footer>
	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>