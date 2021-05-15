<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TypeVacation */

$this->title = 'Создать Вид отпуска';
$this->params['breadcrumbs'][] = ['label' => 'Виды отпусков', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-vacation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
