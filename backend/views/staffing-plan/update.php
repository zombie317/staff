<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StaffingPlan */

$this->title = 'Обновить: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Штатное расписание', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="staffing-plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'position_list' => $position_list,
        'department_list' => $department_list,
    ]) ?>

</div>
