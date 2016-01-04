<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_areas".
 *
 * @property integer $id
 * @property integer $national_id
 * @property string $national_code
 * @property integer $prefecture_id
 * @property string $prefecture_code
 * @property integer $ward_id
 * @property string $ward_code
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Users[] $users
 */
class MasterAreas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['national_id'], 'required'],
            [['national_id', 'prefecture_id', 'ward_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['national_code', 'prefecture_code', 'ward_code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'national_id' => 'National ID',
            'national_code' => 'National Code',
            'prefecture_id' => 'Prefecture ID',
            'prefecture_code' => 'Prefecture Code',
            'ward_id' => 'Ward ID',
            'ward_code' => 'Ward Code',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['area_id' => 'id']);
    }
}
