<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_030520_create_messages_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable('messages', [
            'id'           => $this->primaryKey(),
            'from_id'      => $this->integer(),
            'to_id'        => $this->integer(),
            'message_type' => $this->integer(),     // Hard code: 1 - Hello, 2 - Goodbye,...

            'created_at'   => $this->timestamp(),
            'updated_at'   => $this->timestamp(),
        ]);


        $this->addForeignKey('idx-messages-from_id', 'messages', 'from_id', 'users', 'id', 'CASCADE');
        $this->addForeignKey('idx-messages-to_id', 'messages', 'to_id', 'users', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('messages');
    }
}
