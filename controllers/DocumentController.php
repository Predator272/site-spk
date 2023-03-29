<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use app\models\Document;
use app\models\DocumentSearch;

class DocumentController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['create', 'update', 'delete'],
				'rules' => [
					[
						'actions' => ['create', 'update', 'delete'],
						'allow' => true,
						'roles' => ['@'],
						'matchCallback' => function () {
							return Yii::$app->user->identity->isAdmin;
						}
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

	public function actionIndex()
	{
		$searchModel = new DocumentSearch();
		$dataProvider = $searchModel->search(null);
		return $this->render('index', compact('searchModel', 'dataProvider'));
	}

	public function actionView($id)
	{
		$model = $this->findModel($id);
		return $this->render('view', compact('model'));
	}

	public function actionDownload($id)
	{
		$model = $this->findModel($id);
		header('Content-Disposition: attachment; filename=' . $model->name);
		return $model->data;
	}

	public function actionCreate()
	{
		$model = new Document();
		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
			throw new ServerErrorHttpException(Yii::t('yii', 'An internal server error occurred.'));
		} else {
			$model->loadDefaultValues();
		}
		return $this->render('create', compact('model'));
	}

	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
			throw new ServerErrorHttpException(Yii::t('yii', 'An internal server error occurred.'));
		}
		return $this->render('update', compact('model'));
	}

	public function actionDelete($id)
	{
		if ($this->findModel($id)->delete()) {
			return $this->redirect(['index']);
		}
		throw new ServerErrorHttpException(Yii::t('yii', 'An internal server error occurred.'));
	}

	protected function findModel($id)
	{
		if (($model = Document::findOne(['id' => $id])) !== null) {
			return $model;
		}
		throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
	}
}
