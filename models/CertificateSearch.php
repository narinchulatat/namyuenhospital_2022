<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Certificate;

/**
 * CertificateSearch represents the model behind the search form of `app\models\Certificate`.
 */
class CertificateSearch extends Certificate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'a_1', 'a_2', 'a_3', 'a_4'], 'integer'],
            [['date_certificate', 'fullname', 'fullname_1', 'fullname_2', 'fullname_3'], 'safe'],
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
        $query = Certificate::find();

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
            'date_certificate' => $this->date_certificate,
            'a_1' => $this->a_1,
            'a_2' => $this->a_2,
            'a_3' => $this->a_3,
            'a_4' => $this->a_4,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'fullname_1', $this->fullname_1])
            ->andFilterWhere(['like', 'fullname_2', $this->fullname_2])
            ->andFilterWhere(['like', 'fullname_3', $this->fullname_3]);

        return $dataProvider;
    }
}
