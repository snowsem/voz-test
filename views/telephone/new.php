<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$this->title = 'Telephone controller';
?>
<div class="site-index">

    <div class="body-content">
        <h1>telephone controller!</h1>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'telephone') ?>
        <div class="form-group">
            <?php

            echo $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => $items,
                'language' => 'ru',
                'options' => ['placeholder' => 'Выбрать город'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);

            ?>
        </div>


        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>
</div>
