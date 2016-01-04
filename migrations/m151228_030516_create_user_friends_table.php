<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_030516_create_user_friends_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable('user_friends', [
            'id'             => $this->primaryKey(),
            'user_id'        => $this->integer(),
            'user_friend_id' => $this->integer(),
            'is_block'       => $this->boolean(),
            'is_delete'      => $this->boolean(),

            'created_at'     => $this->timestamp(),
            'updated_at'     => $this->timestamp(),
        ]);

        $this->addForeignKey('idx-users-user_id', 'user_friends', 'user_id', 'users', 'id', 'CASCADE');
        $this->addForeignKey('idx-users-user_friend_id', 'user_friends', 'user_friend_id', 'users', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('user_friends');
    }
}
