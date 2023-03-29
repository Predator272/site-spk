<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Info;

class InfoSearch extends Info
{
	public function rules()
	{
		return [
			[['title', 'onCreate', 'name', 'data'], 'safe'],
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = Info::find();

		$dataProvider = new ActiveDataProvider(['query' => $query]);
		$dataProvider->setSort(['defaultOrder' => ['title' => SORT_ASC]]);
		$dataProvider->setPagination(['pageSize' => 10]);

		$this->load($params);

		if (!$this->validate()) {
			return $dataProvider;
		}

		$query->andFilterWhere(['onCreate' => $this->onCreate,]);
		$query->andFilterWhere(['like', 'title', $this->title]);

		return $dataProvider;
	}
}
