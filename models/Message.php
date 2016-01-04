<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property integer $from_id
 * @property integer $to_id
 * @property integer $message_type
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Users $from
 * @property Users $to
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_id', 'to_id', 'message_type'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_id' => 'From ID',
            'to_id' => 'To ID',
            'message_type' => 'Message Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrom()
    {
        return $this->hasOne(Users::className(), ['id' => 'from_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTo()
    {
        return $this->hasOne(Users::className(), ['id' => 'to_id']);
    }
}
