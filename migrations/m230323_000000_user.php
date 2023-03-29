<?php

use yii\db\Migration;

class m230323_000000_user extends Migration
{
	public static function tableName()
	{
		return 'user';
	}

	public function safeUp()
	{
		$this->createTable(static::tableName(), [
			'id' => $this->bigPrimaryKey()->unsigned()->comment('ID'),
			'username' => $this->string(255)->notNull()->comment('Логин'),
			'password' => $this->string(255)->notNull()->comment('Пароль'),
			'rule' => $this->tinyInteger()->notNull()->defaultValue(0)->comment('Параметры'),
		]);

		$this->insert(static::tableName(), ['username' => 'admin', 'password' => Yii::$app->security->generatePasswordHash('admin'), 'rule' => 1]);
	}

	public function safeDown()
	{
		$this->truncateTable(static::tableName());
		$this->dropTable(static::tableName());
	}
}
