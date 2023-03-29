<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ProfileForm extends Model
{
	public $username;
	public $password;
	public $passwordConfirm;

	public function rules()
	{
		return [
			[['username', 'password', 'passwordConfirm'], 'required'],
			[['username'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
			[['username', 'password'], 'string', 'min' => 4, 'max' => 255],
			[['passwordConfirm'], 'compare', 'compareAttribute' => 'password'],
		];
	}

	public function attributeLabels()
	{
		return [
			'username' => 'Логин',
			'password' => 'Пароль',
			'passwordConfirm' => 'Подтвердите пароль',
		];
	}

	public function update()
	{
		$model = User::findOne(Yii::$app->user->id);
		$model->username = $this->username;
		$model->password = $this->password;
		return $model->save();
	}
}
