<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Firm */

$this->title = 'Обновить: ' . $model->short_name;
$this->params['breadcrumbs'][] = ['label' => 'Организации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->short_name, 'url' => ['view', 'id' => $model->short_name]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="firm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
