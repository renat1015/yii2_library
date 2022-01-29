<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "readers".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 *
 * @property Books[] $books
 * @property BooksReaders[] $booksReaders
 */
class Readers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'readers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email'], 'required'],
            [['name', 'surname', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['id' => 'books_id'])->viaTable('books_readers', ['readers_id' => 'id']);
    }

    /**
     * Gets query for [[BooksReaders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooksReaders()
    {
        return $this->hasMany(BooksReaders::className(), ['readers_id' => 'id']);
    }
}
