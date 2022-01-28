<?php

namespace backend\controllers;

use backend\models\Books;
use backend\models\BooksReaders;
use backend\models\Readers;
use backend\models\ReadersSearch;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * ReadersController implements the CRUD actions for Readers model.
 */
class ReadersController extends MainController
{
    /**
     * Updates an existing Readers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $booksReaders = new BooksReaders();

        if ($this->request->isPost && $booksReaders->load($this->request->post())) {
            $book = Books::findOne(['id' => $booksReaders->books_id]);

            if ($book->count > 0) {
                $book->count = $book->count - 1;

                if ($booksReaders->save()) {
                    if ($book->save()) return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('warning', 'The user has already received this book.');
                }
            } else {
                Yii::$app->session->setFlash('warning', 'Unable to check out the book. The number of books is not enough.');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Readers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Readers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Readers::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function newModelSearch()
    {
        return new ReadersSearch();
    }

    protected function newModel()
    {
        return new Readers();
    }
}
