<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_030509_create_user_table extends Migration
{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable('users', [
            'id'         => $this->primaryKey(),                        //—> Primary key
            'email'      => $this->string()->notNull()->unique(),       //—> String, Unique, not null
            'is_active'  => $this->boolean()->defaultValue(false),
            'password'   => $this->string(65),
            'name'       => $this->string(),
            'is_admin'   => $this->boolean()->defaultValue(false),
            'icon'       => $this->integer()->defaultValue(0),          //--> Hardcode: 1 - Smile, 2 - Cry,...
            'area_id'    => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('idx-users-area', 'users', 'area_id', 'master_areas', 'id', 'CASCADE');

        for ($i = 0; $i < 35; $i++) {
            $this->insert('users' ,[
                'email'     => 'user' . ($i + 1) . '@gmail.com',
                'is_active' => 1,
                'name'      => 'Username ' . $i,
                'area_id'   => rand(1, 25),
                'password'  => Yii::$app->getSecurity()->generatePasswordHash('123456'),
            ]);
        }

    }

    public function safeDown()
    {
        $this->dropTable('users');
    }



}














