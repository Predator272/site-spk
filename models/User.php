<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
	public static function tableName()
	{
		return 'user';
	}

	public function rules()
	{
		return [
			[['username', 'password'], 'required'],
			[['username'], 'filter', 'filter' => 'trim'],
			[['rule'], 'integer'],
			[['username', 'password'], 'string', 'min' => 4, 'max' => 255],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'username' => 'Логин',
			'password' => 'Пароль',
			'rule' => 'Параметры',
		];
	}

	public static function findIdentity($id)
	{
		return static::findOne($id);
	}

	public static function findIdentityByAccessToken($token, $type = null)
	{
		return null;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getAuthKey()
	{
		return null;
	}

	public function validateAuthKey($authKey)
	{
		return null;
	}

	public function beforeSave($insert)
	{
		$this->password = Yii::$app->security->generatePasswordHash($this->password);
		return parent::beforeSave($insert);
	}

	public static function findByUsername($username)
	{
		return static::findOne(['username' => $username]);
	}

	public function validatePassword($password)
	{
		return Yii::$app->security->validatePassword($password, $this->password);
	}

	public function getIsAdmin()
	{
		return $this->rule === 1;
	}
}
