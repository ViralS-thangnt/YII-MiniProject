<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "devices".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $device_code
 * @property integer $platform
 * @property string $created_at
 * @property string $updated_at
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'devices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'platform'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['device_code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'device_code' => 'Device Code',
            'platform' => 'Platform',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}








