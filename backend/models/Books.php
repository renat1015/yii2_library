<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $description
 * @property int $count
 *
 * @property BooksReaders[] $booksReaders
 * @property Readers[] $readers
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'author', 'description', 'count'], 'required'],
            [['description'], 'string'],
            [['count'], 'default', 'value' => null],
            [['count'], 'integer'],
            [['title', 'author'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'description' => 'Description',
            'count' => 'Count',
        ];
    }

    /**
     * Gets query for [[BooksReaders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooksReaders()
    {
        return $this->hasMany(BooksReaders::className(), ['books_id' => 'id']);
    }

    /**
     * Gets query for [[Readers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasMany(Readers::className(), ['id' => 'readers_id'])->viaTable('books_readers', ['books_id' => 'id']);
    }
}
