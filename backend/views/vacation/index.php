<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\VacationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отпуска';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacation-index">

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
            'number',
            'date',
            //            'id_employee',
            [
                'label' => 'Фамилия',
                'attribute' => 'last_name',
                'value' => 'employee.last_name',
            ],
            [
                'label' => 'Имя',
                'attribute' => 'first_name',
                'value' => 'employee.first_name',
            ],
            [
                'label' => 'Отчество',
                'attribute' => 'middle_name',
                'value' => 'employee.middle_name',
            ],
//            'id_firm',
            [
                'label' => 'Организация',
                'attribute' => 'short_name',
                'value' => 'firm.short_name',
            ],
            //'id_type_vacation',
            //'date_start',
            //'date_end',
            //'quantity_days',
            //'article',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
