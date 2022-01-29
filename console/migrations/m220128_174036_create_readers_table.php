<?php

use yii\db\Migration;

class m220128_174036_create_readers_table extends Migration
{

    public function up()
    {
        $this->createTable('{{%readers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%readers}}');
    }
}
