<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $email
 * @property integer $is_active
 * @property string $password
 * @property integer $is_admin
 * @property integer $icon
 * @property integer $area_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Devices[] $devices
 * @property Messages[] $messages
 * @property Messages[] $messages0
 * @property UserFriends[] $userFriends
 * @property UserFriends[] $userFriends0
 * @property MasterAreas $area
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['is_active', 'is_admin', 'icon', 'area_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 65],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'is_active' => 'Is Active',
            'password' => 'Password',
            'is_admin' => 'Is Admin',
            'icon' => 'Icon',
            'area_id' => 'Area ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevices()
    {
        return $this->hasMany(Devices::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['to_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages0()
    {
        return $this->hasMany(Messages::className(), ['from_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFriends()
    {
        return $this->hasMany(UserFriends::className(), ['user_friend_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFriends0()
    {
        return $this->hasMany(UserFriends::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(MasterAreas::className(), ['id' => 'area_id']);
    }



    // Authentication
    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    // public static function findByUsername($username)
    // {
    //     // foreach (self::$users as $user) {
    //     //     if (strcasecmp($user['username'], $username) === 0) {
    //     //         return new static($user);
    //     //     }
    //     // }

    //     $user = User::findOne(['email'  => '']);

    //     return null;
    // }

}
