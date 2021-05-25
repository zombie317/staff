<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\StaffingPlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Штатное расписание';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffing-plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'id_position',
            [
                'label' => 'Должность',
                'attribute' => 'position_name',
                'value' => 'position.name',
            ],
//            'id_department',
            [
                'label' => 'Отдел',
                'attribute' => 'department_name',
                'value' => 'department.name',
            ],
            'quantity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
