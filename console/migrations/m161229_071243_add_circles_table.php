<?php

use yii\db\Migration;

class m161229_071243_add_circles_table extends Migration
{
    public function up()
    {
      /* CREATE TABLE `circle` ( */
      /* 			     `id` int(11) NOT NULL AUTO_INCREMENT, */
      /* 			     `x` int(11) NOT NULL DEFAULT '0', */
      /* 			     `y` int(11) NOT NULL DEFAULT '0', */
      /* 			     `radius` int(11) NOT NULL DEFAULT '0', */
      /* 			     `color` int(11) NOT NULL DEFAULT '0', */
      /* 			     `name` varchar(45) DEFAULT NULL, */
      /* 			     PRIMARY KEY (`id`), */
      /* 			     UNIQUE KEY `id_UNIQUE` (`id`) */
      /* 			     ) ENGINE=InnoDB DEFAULT CHARSET=utf8; */

      $this->createTable('circles', [
				  'id' => Schema::TYPE_PK,
				  'x' => Schema::TYPE_INTEGER,
				  'y' => Schema::TYPE_INREGER,
				  'radius' => Schema::TYPE_INREGER,
				  'color' => Schema::TYPE_INREGER,
				  ]);
    }

    public function down()
    {
        echo "m161229_071243_add_circles_table cannot be reverted.\n";

        return false;
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
