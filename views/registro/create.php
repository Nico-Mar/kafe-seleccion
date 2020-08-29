<?php

use yii\helpers\Html;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\registro */

$this->title = 'Crear Nuevo Registro';
//$this->params['breadcrumbs'][] = ['label' => 'Registros', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card text-white bg-warning" style="border-radius: 25px; padding:20px">
      
      <div class="card-body">
        
        <?= $this->render('_form', [
        'model' => $model,
        'listaRegistrados' => $listaRegistrados,
    ]) ?>

      </div>
    </div>


</div>
