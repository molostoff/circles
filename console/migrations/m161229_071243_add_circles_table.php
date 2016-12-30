<?php

use yii\db\Migration;
use yii\db\Schema;

class m161229_071243_add_circles_table extends Migration
{
    public function up()
    {
       $this->createTable('circles', [
				  'id' => Schema::TYPE_PK,
				  'x' => Schema::TYPE_INTEGER,
				  'y' => Schema::TYPE_INTEGER,
				  'radius' => Schema::TYPE_INTEGER,
				  'color' => Schema::TYPE_INTEGER,
       		'message' => Schema::TYPE_TEXT,

				  ], 'DEFAULT CHARACTER SET utf8');
    }

    public function down()
    {
        $this->dropTable('circles');

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
