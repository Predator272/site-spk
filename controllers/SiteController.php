<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ProfileForm;

class SiteController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout', 'profile'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
					[
						'actions' => ['profile'],
						'allow' => true,
						'roles' => ['@'],
						'matchCallback' => function () {
							return Yii::$app->user->identity->isAdmin;
						}
					]
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionProfile()
	{
		$model = new ProfileForm(['username' => Yii::$app->user->identity->username]);
		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $model->update()) {
				Yii::$app->session->setFlash('success', 'Сохранено.');
			} else {
				Yii::$app->session->setFlash('error', 'Неудалось сохранить изменения.');
			}
			return $this->redirect($this->request->referrer);
		}
		return $this->render('profile', compact('model'));
	}

	public function actionLogin()
	{
		$model = new LoginForm();
		if ($model->load($this->request->post()) && $model->login()) {
			return $this->goBack();
		}
		$model->password = '';
		return $this->render('login', compact('model'));
	}

	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}
}
