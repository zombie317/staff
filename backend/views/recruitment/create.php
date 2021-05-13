<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recruitment */

$this->title = 'Create Recruitment';
$this->params['breadcrumbs'][] = ['label' => 'Recruitments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruitment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
