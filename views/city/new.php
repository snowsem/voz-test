<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'City controller';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="body-content">
        <h1>City controller!</h1>

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="form-group col-lg-4">
                <div class="form-group">

                    <?= $form->field($model, 'name') ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-4">
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>


            <?php ActiveForm::end(); ?>


        </div>
    </div>
