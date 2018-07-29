<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
            'attribute'=>'ts',
            'format' => ['date', Yii::$app->formatter->datetimeFormat],
            'contentOptions' => ['style' => 'max-width: 150px;']
            ],
            'type',
            [
            'attribute'=>'message',
            'contentOptions' => ['style' => 'max-width: 900px; word-wrap: break-word;']
            ],
        ],
        'panel' => ['before'=> ''],
        'toolbar'=> [],
    ]); ?>
</div>