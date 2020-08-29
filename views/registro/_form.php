<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\registro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registro-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_nacimiento')->widget(DatePicker::className(),[
        'name' => 'check_issue_date',
        'value' => date('Y-m-d', strtotime('+2 days')),
        'options' => ['placeholder' => 'Indique fecha de nacimiento.'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_referente')->widget(Select2::classname(), [
        'data' => $listaRegistrados,
        'options' => ['placeholder' => Yii::t('app', 'Seleccione por quién fue referido.') . '...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Referente', ['class' => 'label-class'])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>