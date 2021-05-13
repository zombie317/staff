<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TypeVacation */

$this->title = 'Update Type Vacation: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Type Vacations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-vacation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
