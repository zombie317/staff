<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TypeVacation */

$this->title = 'Обновить Вид отпуска: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Виды отпусков', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="type-vacation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
