<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Passport */

$this->title = 'Создать Паспортные данные';
$this->params['breadcrumbs'][] = ['label' => 'Паспортные данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employee_list' => $employee_list,
    ]) ?>

</div>
