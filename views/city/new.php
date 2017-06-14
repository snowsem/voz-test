<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'City controller';
?>
<div class="site-index">

    <div class="body-content">
        <h1>City controller!</h1>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>
</div>
