<?php

use common\widgets\Alert;
use backend\models\Books;
use backend\models\BooksReaders;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Readers */
/* @var $form yii\widgets\ActiveForm */
?>

<?= Alert::widget() ?>

<div class="readers-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $model2 = new BooksReaders(); ?>

    <?php $books = Books::find()->all(); ?>

    <?php $items = ArrayHelper::map($books,'id','title'); ?>
    <?php $params = ['prompt' => 'Выберите книгу']; ?>

    <?= $form->field($model2, 'books_id')->dropDownList($items, $params) ?>
    <?= $form->field($model2, 'readers_id')->hiddenInput(['value' => $model->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Give', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
