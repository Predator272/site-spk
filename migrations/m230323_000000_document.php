<?php

use yii\db\Migration;

class m230323_000000_document extends Migration
{
	public static function tableName()
	{
		return 'document';
	}

	public function safeUp()
	{
		$this->createTable(static::tableName(), [
			'id' => $this->bigPrimaryKey()->unsigned()->comment('ID'),
			'title' => $this->string(255)->notNull()->comment('Название'),
			'onCreate' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата создания'),
			'name' => $this->string(255)->notNull()->comment('Имя'),
			'data' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGBLOB')->notNull()->comment('Файл'),
		]);
	}

	public function safeDown()
	{
		$this->truncateTable(static::tableName());
		$this->dropTable(static::tableName());
	}
}
