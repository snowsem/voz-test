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
        <h1>Contact controller!</h1>

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="form-group col-lg-6">
                <div class="form-group">
                    <?= $form->field($model, 'name') ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-4">
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
            </div>
        </div>


        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>
</div>
