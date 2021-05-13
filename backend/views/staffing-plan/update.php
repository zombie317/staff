<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StaffingPlan */

$this->title = 'Update Staffing Plan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Staffing Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staffing-plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
