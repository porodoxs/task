<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Log;

/**
 * LogSearch represents the model behind the search form of `app\models\Log`.
 */
class LogSearch extends Log
{
    public $ts_from;
    public $ts_to;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['ts_from', 'ts_to'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Log::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        if($this->ts_from && $this->ts_to)
        $query->andFilterWhere(['between', 'ts', strtotime($this->ts_from), strtotime($this->ts_to)]);
        if($this->ts_from)
        $query->andFilterWhere(['>=', 'ts', strtotime($this->ts_from)]);
        if($this->ts_to)
        $query->andFilterWhere(['<=', 'ts', strtotime($this->ts_to)]);
        $query->andFilterWhere([
            'type' => $this->type,
        ]);

        return $dataProvider;
    }
}
