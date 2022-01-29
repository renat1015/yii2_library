<?php

use backend\models\Books;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $books array */
?>

<script>
    function select_book() {
        let books = <?= json_encode($books) ?>;
        let e = document.getElementById("books-id");
        let val = e.value;

        $("#books-author").val(books[val].author);
        $("#books-title").val(books[val].title);
        $("#books-description").val(books[val].description);
    }
</script>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $model = new Books(); ?>

    <?php $items = [];
        foreach($books as $k => $v) {
            array_push($items, ['id' => $k, 'title' => $v['author'] . ': ' . $v['title']]);
        }
    ?>

    <?php $params = [
        'prompt' => 'Выберите книгу',
        'onchange' => 'select_book()'
    ]; ?>

    <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map($items,'id','title'), $params)->label('Books') ?>

    <?php ActiveForm::end(); ?>

</div>
