<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Report;

/**
 * ReportSearch represents the model behind the search form about `app\models\Report`.
 */
class ReportSearch extends Report
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'task_id'], 'integer'],
            [['create_date', 'report_date', 'value', 'task'], 'safe'],
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
        $query = Report::find();
        $query->joinWith(['task']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['task']=[
            'asc'=>['tasks.name'=>SORT_ASC],
            'desc'=>['tasks.name'=>SORT_DESC],
        ];
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'create_date' => $this->create_date,
            'report_date' => $this->report_date,
            'task_id' => $this->task_id,
        ]);
        $query->andFilterWhere(['like','tasks.name',$this->task]);
        $query->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
