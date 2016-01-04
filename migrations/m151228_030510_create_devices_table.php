<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_030510_create_devices_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable('devices', [
            'id'          => $this->primaryKey(),
            'user_id'     => $this->integer(),
            'device_code' => $this->string(),
            'platform'    => $this->smallInteger(), // Android, Platform - hard code

            'created_at'  => $this->timestamp(),
            'updated_at'  => $this->timestamp(),

        ]);

        $this->addForeignKey('idx-devices', 'devices', 'user_id', 'users', 'id', 'CASCADE');

        for ($i = 0; $i < 100; $i++) {
            $this->insert('devices', [
                'user_id'   =>  rand(1, 35),
                'device_code'   =>  str_shuffle('abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),
                'platform'  =>  rand(0, 1),
                'created_at'    =>  date('Y-m-d H:i:s'),
                'updated_at'    =>  date('Y-m-d H:i:s'),

            ]);
        }


    }

    public function safeDown()
    {
        $this->dropTable('devices');
    }
}
