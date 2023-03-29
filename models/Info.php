<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Info extends ActiveRecord
{
	public $uploadedFile;

	public static function tableName()
	{
		return 'info';
	}

	public function rules()
	{
		return [
			[['title'], 'required'],
			[['title'], 'string', 'max' => 255],
			[['uploadedFile'], 'file', 'skipOnEmpty' => false, 'maxSize' => 1024 * 1024 * 50]
		];
	}

	public function attributeLabels()
	{
		return [
			'title' => 'Название',
			'uploadedFile' => 'Файл',
		];
	}

	public function beforeValidate()
	{
		if ($this->uploadedFile = UploadedFile::getInstance($this, 'uploadedFile')) {
			$this->name = $this->uploadedFile->name;
			$this->data = file_get_contents($this->uploadedFile->tempName);
		}
		return parent::beforeValidate();
	}

	public function getSize()
	{
		return strlen($this->data);
	}
}
