<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recruitment */

$this->title = 'Создать Приказ о приеме на работу';
$this->params['breadcrumbs'][] = ['label' => 'Приказы о приеме', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruitment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employee_list' => $employee_list,
        'firm_list' => $firm_list,
        'position_list' => $position_list,
        'department_list' => $department_list,
    ]) ?>

</div>
