<?php

namespace common\models;

use common\models\Circle;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CircleSearch represents the model behind the search form about `app\models\Circle`.
 */
class CircleSearch extends Circle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'x', 'y', 'radius', 'color'], 'integer'],
            [['message'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Circle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'x' => $this->x,
            'y' => $this->y,
            'radius' => $this->radius,
            'color' => $this->color,
        ])
        	->andFilterWhere(['like', 'message', $this->message])
        ;

        return $dataProvider;
    }
}
