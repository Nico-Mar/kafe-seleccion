<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\registroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card text-white bg-warning" style="border-radius: 25px; padding:20px">

        <div class="card-body">

            <p>
                <?= Html::a('Crear Registro', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    'nombre',
                    'apellido',
                    'fecha_nacimiento',
                    'email:email',
                    'dni',
                    //'id_referente',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>


</div>