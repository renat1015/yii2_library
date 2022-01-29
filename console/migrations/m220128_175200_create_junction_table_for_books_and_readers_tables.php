<?php

use yii\db\Migration;

class m220128_175200_create_junction_table_for_books_and_readers_tables extends Migration
{
    public function up()
    {
        $this->createTable('{{%books_readers}}', [
            'books_id' => $this->integer(),
            'readers_id' => $this->integer(),
            'PRIMARY KEY(books_id, readers_id)',
        ]);

        // creates index for column `books_id`
        $this->createIndex(
            '{{%idx-books_readers-books_id}}',
            '{{%books_readers}}',
            'books_id'
        );

        // add foreign key for table `{{%books}}`
        $this->addForeignKey(
            '{{%fk-books_readers-books_id}}',
            '{{%books_readers}}',
            'books_id',
            '{{%books}}',
            'id',
            'CASCADE'
        );

        // creates index for column `readers_id`
        $this->createIndex(
            '{{%idx-books_readers-readers_id}}',
            '{{%books_readers}}',
            'readers_id'
        );

        // add foreign key for table `{{%readers}}`
        $this->addForeignKey(
            '{{%fk-books_readers-readers_id}}',
            '{{%books_readers}}',
            'readers_id',
            '{{%readers}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `{{%books}}`
        $this->dropForeignKey(
            '{{%fk-books_readers-books_id}}',
            '{{%books_readers}}'
        );

        // drops index for column `books_id`
        $this->dropIndex(
            '{{%idx-books_readers-books_id}}',
            '{{%books_readers}}'
        );

        // drops foreign key for table `{{%readers}}`
        $this->dropForeignKey(
            '{{%fk-books_readers-readers_id}}',
            '{{%books_readers}}'
        );

        // drops index for column `readers_id`
        $this->dropIndex(
            '{{%idx-books_readers-readers_id}}',
            '{{%books_readers}}'
        );

        $this->dropTable('{{%books_readers}}');
    }
}
