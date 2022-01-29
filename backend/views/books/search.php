<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Search Books';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_search_form') ?>

</div>
