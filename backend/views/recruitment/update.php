<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recruitment */

$this->title = 'Обновить: ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Приказы о приеме', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="recruitment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
