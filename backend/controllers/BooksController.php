<?php

namespace backend\controllers;

use backend\models\Books;
use backend\models\BooksSearch;
use yii\web\NotFoundHttpException;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends MainController implements Template
{
    public function actionSearch()
    {
        return $this->render('search');
    }

    public function actionCreate()
    {
        $model = $this->newModel();
        $books = [];

        if ($this->request->isGet && $this->request->get('query')) {
            $books = $this->getApi($this->request->get('query'));
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'books' => $books,
        ]);
    }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Books::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function newModelSearch()
    {
        return new BooksSearch();
    }

    protected function newModel()
    {
        return new Books();
    }

    public function getApi($query)
    {
        $books = [];

//        $url = 'https://api2.isbndb.com/book/' . urlencode($query);
//        $restKey = 'YOUR_REST_KEY';
//
//        $headers = array(
//            "Content-Type: application/json",
//            "Authorization: " . $restKey
//        );
//
//        $rest = curl_init();
//        curl_setopt($rest,CURLOPT_URL,$url);
//        curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);
//        curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);
//
//        $response = curl_exec($rest);
//
//        curl_close($rest);
//
//        return $response;

        $url = 'https://www.googleapis.com/books/v1/volumes?q=' . urlencode($query);

        $page = file_get_contents($url);

        $data = json_decode($page, true);

        foreach ($data['items'] as $val) {
            if (!array_key_exists('authors', $val['volumeInfo']) || !array_key_exists('title', $val['volumeInfo'])) {
                continue;
            }

            $author = implode(", ", $val['volumeInfo']['authors']);
            $title = $val['volumeInfo']['title'];
            if (array_key_exists('subtitle', $val['volumeInfo'])) {
                $title .= ' (' . $val['volumeInfo']['subtitle'] . ')';
            }
            $description = '';
            if (array_key_exists('description', $val['volumeInfo'])) {
                $description = $val['volumeInfo']['description'];
            }
            array_push($books, ['author' => $author, 'title' => $title, 'description' => $description]);
        }

        return $books;
    }
}
