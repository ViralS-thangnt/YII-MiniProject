<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_friends".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_friend_id
 * @property integer $is_block
 * @property integer $is_delete
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Users $userFriend
 * @property Users $user
 */
class UserFriend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_friends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_friend_id', 'is_block', 'is_delete'], 'integer'],
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
            'user_id' => 'User ID',
            'user_friend_id' => 'User Friend ID',
            'is_block' => 'Is Block',
            'is_delete' => 'Is Delete',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFriend()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_friend_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
