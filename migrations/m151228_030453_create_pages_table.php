<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_030453_create_pages_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable('pages', [
            'id'           => $this->primaryKey(),
            'title'        => $this->string(),
            'content'      => $this->string(),
            'content_type' => $this->string(),  // (about, copyright, invite)

            'created_at'   => $this->timestamp(),
            'updated_at'   => $this->timestamp(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('pages');
    }
}
