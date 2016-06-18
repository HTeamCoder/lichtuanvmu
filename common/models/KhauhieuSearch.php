<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\khauhieu;

/**
 * KhauhieuSearch represents the model behind the search form about `common\models\khauhieu`.
 */
class KhauhieuSearch extends khauhieu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'donvi_id'], 'integer'],
            [['banner'], 'safe'],
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
        if(Yii::$app->user->identity->roles == 'admin') {
            $query = khauhieu::find()->orderBy('id DESC');
        }
        else{
            $query = khauhieu::find()->where(['donvi_id'=>Yii::$app->user->identity->donvi_id])->orderBy('id DESC');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'donvi_id' => $this->donvi_id,
        ]);

        $query->andFilterWhere(['like', 'banner', $this->banner]);

        return $dataProvider;
    }
}
