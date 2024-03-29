<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Readers */

$this->title = 'Update Readers: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Readers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="readers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update_form', [
        'model' => $model,
    ]) ?>

</div>
