<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_030507_create_master_areas_table extends Migration
{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable('master_areas', [
            'id'              => $this->primaryKey(),
            'national_id'     => $this->integer()->notNull(),
            'national_code'   => $this->string()->defaultValue(''),
            'prefecture_id'   => $this->integer(),
            'prefecture_code' => $this->string()->defaultValue(''),
            'ward_id'         => $this->integer(),
            'ward_code'       => $this->string()->defaultValue(''),

            'created_at'      => $this->timestamp(),
            'updated_at'      => $this->timestamp(),
        ]);
        for ($i = 0; $i < 25; $i++) {
            $this->insert('master_areas', [
                'national_id'   => $i,
            ]);
        }

    }

    public function safeDown()
    {
        $this->dropTable('master_areas');
    }
}
