<?php

namespace common\models;

use common\models\Circle;
//use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CircleSearch represents the model behind the search form about
 * `app\models\Circle`.
 */
class CircleSearch extends Circle {

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search ($params) {
		$query = Circle::find()->active();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider(['query' => $query]);

		$this->load($params);

		if ($this->validate()) {
			// grid filtering conditions
			$dataProvider->query->andFilterWhere(
					[ // 'id' => $this->id,
'x' => $this->x, 'y' => $this->y, 'radius' => $this->radius,
						'color' => $this->color])
				->andFilterWhere(['like', 'message', $this->message]);
		}

		return $dataProvider;
	}
}
