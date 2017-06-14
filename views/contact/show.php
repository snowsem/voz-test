<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;

$this->title = 'Telephone controller';
?>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-md-8">

                <h2>Имя: <?= Html::encode("{$contact->name}") ?></h2>
                <a class="btn btn-default" href="/contact/edit/<?= Html::encode("{$contact->id}")?>">Редактировать</a>
                <h4>Город: <?= $contact->city ? Html::encode("{$contact->city->name}") : '' ?></h4>
            </div>
            <div class="col-md-4">
                <h2>Телефоны</h2>
                <a class="btn btn-default" href="/telephone/new_for_contact/<?= Html::encode("{$contact->id}")?>">Добавить телефон</a>
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Телефон</th>
                        <th>Город</th>
                        <th class="text-right">Действия</th>
                    </tr>
                    </thead>
                    <tbody class="text-left">
                    <?php foreach ($contact->telephones as $telephone): ?>
                        <tr>

                            <td><?= Html::encode("{$telephone->telephone}") ?></td>
                            <td><?= $telephone->city ? Html::encode("{$telephone->city->name}") : '' ?></td>
                            <td class="text-right">
                                <a href="/telephone/edit_for_contact/<?= $telephone->id ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                <a href="/telephone/delete/<?= $telephone->id ?>"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>




    </div>
</div>
