<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trips */

$this->title = 'Обновить: ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Командировки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="trips-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employee_list' => $employee_list,
        'firm_list' => $firm_list,
    ]) ?>

</div>
