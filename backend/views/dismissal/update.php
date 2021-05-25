<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dismissal */

$this->title = 'Обновить: ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Приказы об увольнении', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="dismissal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employee_list' => $employee_list,
        'firm_list' => $firm_list,
        'position_list' => $position_list,
        'department_list' => $department_list,
    ]) ?>

</div>
