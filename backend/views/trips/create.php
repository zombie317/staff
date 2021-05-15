<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trips */

$this->title = 'Создать Приказ о командировке';
$this->params['breadcrumbs'][] = ['label' => 'Командировки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trips-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
