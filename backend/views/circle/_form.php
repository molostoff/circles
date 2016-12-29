<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Circle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="circle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'x')->textInput() ?>

    <?= $form->field($model, 'y')->textInput() ?>

    <?= $form->field($model, 'radius')->textInput() ?>

    <?= $form->field($model, 'color')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
