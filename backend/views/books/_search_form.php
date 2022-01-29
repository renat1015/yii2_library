<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?= Html::beginForm(['create'], 'GET'); ?>

    <p>Search</p>

    <?= Html::input('text', 'query', null, ['class' => 'form-control margin-bottom']); ?>

    <div class="form-group">
        <?= Html::submitButton('GET', ['class' => 'btn btn-primary']); ?>
    </div>

    <?= Html::endForm(); ?>

</div>
