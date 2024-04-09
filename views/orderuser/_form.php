<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Orderuser $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orderuser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput() ?>

    <?= $form->field($model, 'executor_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
