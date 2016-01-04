<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Device;


class DeviceSearch extends Device
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['device_code', 'user_id'], 'safe'],
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

        $query = Device::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('user');   // Join table foreign key

        // $query->andFilterWhere([
        //     'devices.id' => $this->id,
        // ]);

        $query->andFilterWhere(['like', 'devices.id', $this->id ]); // like with ID

        if(!isset($params['sort'])) {

            $query->orderBy(['id'   =>  SORT_DESC]);
        }

        $query->andFilterWhere(['like', 'device_code', $this->device_code])
                ->andFilterWhere(['like', 'users.email', $this->user_id]);

        return $dataProvider;
    }


}