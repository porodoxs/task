<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\LogSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.form-group{
    margin: 10px 25px 15px 10px;
    width: 45%;
    float: left;
}
.buttons{
    width: 100%;
}
</style>
<div class="log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ts_from')->label('Дата от:')->widget(DateTimePicker::className(), [
        'name' => 'ts_1',
        'type' => DateTimePicker::TYPE_INPUT,
        'language' => 'ru',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-mm-yyyy hh:ii:ss',
        ]
    ]); ?>
        <?= $form->field($model, 'ts_to')->label('Дата до:')->widget(DateTimePicker::className(), [
        'name' => 'ts_1',
        'type' => DateTimePicker::TYPE_INPUT,
        'language' => 'ru',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-mm-yyyy hh:ii:ss',
        ]
    ]); ?>

    <?php 
    $type_list = [];
    for ($i = 1; $i <= 10; $i++) {
        $type_list += [$i => $i];
    }
    ?>

    <?php echo $form->field($model, 'type')->dropDownList(
    $type_list,
    [
        'prompt' => 'Все'
    ]); ?>

    <div class="form-group buttons">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
