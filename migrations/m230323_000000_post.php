<?php

use yii\db\Migration;

class m230323_000000_post extends Migration
{
	public static function tableName()
	{
		return 'post';
	}

	public function safeUp()
	{
		$this->createTable(static::tableName(), [
			'id' => $this->bigPrimaryKey()->unsigned()->comment('ID'),
			'title' => $this->string(255)->notNull()->comment('Заголовок'),
			'text' => $this->text()->notNull()->comment('Текст'),
			'onCreate' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата создания'),
		]);
	}

	public function safeDown()
	{
		$this->truncateTable(static::tableName());
		$this->dropTable(static::tableName());
	}
}
