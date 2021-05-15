<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PassportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Паспортные данные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-index">

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
            'series',
            'number',
            'name',
            //'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
