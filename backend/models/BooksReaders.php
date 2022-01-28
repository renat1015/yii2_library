<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "books_readers".
 *
 * @property int $books_id
 * @property int $readers_id
 *
 * @property Books $books
 * @property Readers $readers
 */
class BooksReaders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books_readers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['books_id', 'readers_id'], 'required'],
            [['books_id', 'readers_id'], 'default', 'value' => null],
            [['books_id', 'readers_id'], 'integer'],
            [['books_id', 'readers_id'], 'unique', 'targetAttribute' => ['books_id', 'readers_id']],
            [['books_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['books_id' => 'id']],
            [['readers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Readers::className(), 'targetAttribute' => ['readers_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'books_id' => 'Books ID',
            'readers_id' => 'Readers ID',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasOne(Books::className(), ['id' => 'books_id']);
    }

    /**
     * Gets query for [[Readers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasOne(Readers::className(), ['id' => 'readers_id']);
    }
}
