<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Recruitment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recruitment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'id_employee')->dropDownList($employee_list, ['prompt'=>'Выберите ...']) ?>

    <?= $form->field($model, 'id_firm')->dropDownList($firm_list, ['prompt'=>'Выберите ...']) ?>

    <?= $form->field($model, 'id_position')->dropDownList($position_list, ['prompt'=>'Выберите ...']) ?>

    <?= $form->field($model, 'id_department')->dropDownList($department_list, ['prompt'=>'Выберите ...']) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
