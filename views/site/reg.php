<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\bootstrap4;
/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
?>
<div class="site-reg">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'firsName') ?>
        <?= $form->field($model, 'midleName') ?>
        <?= $form->field($model, 'lastName') ?>
        <?= $form->field($model, 'adress') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password2')->passwordInput() ?>
        <?= $form->field($model, 'approval')->checkbox()  ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-reg -->
