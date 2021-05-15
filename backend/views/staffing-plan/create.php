<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StaffingPlan */

$this->title = 'Создать Штатную единицу';
$this->params['breadcrumbs'][] = ['label' => 'Штатное расписание', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffing-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
