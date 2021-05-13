<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\VacationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vacation', ['create'], ['class' => 'btn btn-success']) ?>
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
            'id_employee',
            'id_firm',
            //'id_type_vacation',
            //'date_start',
            //'date_end',
            //'quantity_days',
            //'article',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
