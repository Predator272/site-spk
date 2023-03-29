<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;

class PostSearch extends Post
{
	public function rules()
	{
		return [
			[['title', 'text', 'onCreate'], 'safe'],
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = Post::find();

		$dataProvider = new ActiveDataProvider(['query' => $query]);
		$dataProvider->setSort(['defaultOrder' => ['onCreate' => SORT_DESC]]);
		$dataProvider->setPagination(['pageSize' => 10]);

		$this->load($params);

		if (!$this->validate()) {
			return $dataProvider;
		}

		$query->andFilterWhere(['onCreate' => $this->onCreate,]);
		$query->andFilterWhere(['like', 'title', $this->title])->andFilterWhere(['like', 'text', $this->text]);

		return $dataProvider;
	}
}
