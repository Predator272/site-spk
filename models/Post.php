<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
	public static function tableName()
	{
		return 'post';
	}

	public function rules()
	{
		return [
			[['title', 'text'], 'required'],
			[['text'], 'string'],
			[['onCreate'], 'safe'],
			[['title'], 'string', 'max' => 255],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Заголовок',
			'text' => 'Текст',
			'onCreate' => 'Дата создания',
		];
	}
}
