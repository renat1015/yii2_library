<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Books */
/* @var $books array */

$this->title = 'Create Books';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_select_form', [
        'books' => $books,
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
