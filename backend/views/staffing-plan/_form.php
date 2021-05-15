<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StaffingPlan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staffing-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_position')->textInput() ?>

    <?= $form->field($model, 'id_department')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
