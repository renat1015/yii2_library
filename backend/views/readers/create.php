<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Readers */

$this->title = 'Create Readers';
$this->params['breadcrumbs'][] = ['label' => 'Readers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="readers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
