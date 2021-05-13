<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dismissal */

$this->title = 'Create Dismissal';
$this->params['breadcrumbs'][] = ['label' => 'Dismissals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dismissal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
