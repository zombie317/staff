<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vacation */

$this->title = 'Создать Приказ об отпуске';
$this->params['breadcrumbs'][] = ['label' => 'Отпуска', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employee_list' => $employee_list,
        'firm_list' => $firm_list,
        'type_list' => $type_list,
    ]) ?>

</div>
