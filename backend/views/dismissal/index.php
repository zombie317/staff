<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DismissalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Приказы об увольнении';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dismissal-index">

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
            //'id_position',
            //'id_department',
            //'article',
            //'cause',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
