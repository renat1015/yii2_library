<?php

use yii\db\Migration;

class m220128_172843_create_books_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'author' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'count' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%books}}');
    }
}
