<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\News;

/**
 * NewsSearch represents the model behind the search form about `app\models\News`.
 */
class NewsSearch extends News {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'cat_id', 'view'], 'integer'],
            [['title', 'detail', 'post_date', 'update_date','docs','ref'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {


        $query = News::find()->where(['cat_id' => 1]);

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
            'cat_id' => $this->cat_id,
            'post_date' => $this->post_date,
            'update_date' => $this->update_date,
            'view' => $this->view,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'docs', $this->docs])
                ->andFilterWhere(['like', 'ref', $this->ref])
                ->andFilterWhere(['like', 'detail', $this->detail]);


        return $dataProvider;
    }

    public function searchNewswork() {

        $query = News::find()->where(['cat_id' => 2]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }

    public function searchNewspurchase() {

      $query = News::find()->where(['cat_id' => 3]);
      $dataProvider = new ActiveDataProvider([
          'query' => $query,
      ]);
        return $dataProvider;
      }

      public function searchNewsplan() {

          $query = News::find()->where(['cat_id' => 4]);
          $dataProvider = new ActiveDataProvider([
              'query' => $query,
          ]);
          return $dataProvider;
      }

    public function searchNewsall() {

        $cat_id =  Yii::$app->request->getQueryParam('cat_id');
        $query = News::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['cat_id' => $cat_id]),
        ]);
        return $dataProvider;
    }

    public function searchNewsadmin($params) {
        $query = News::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }

}
