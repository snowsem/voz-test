<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
$this->title = 'Telephone controller';
?>
<div class="site-index">

    <div class="body-content">
        <h1>Telephone controller!</h1>
        <a class="btn btn-default" href="/telephone/new">Добавить</a>
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Номер</th>
                <th>Имя</th>
                <th>Город</th>
                <th class="text-right">Действия</th>

            </tr>
            </thead>
            <tbody class="text-left">
            <?php foreach ($telephones as $telephone): ?>
                <tr>
                    <td><?= Html::encode("{$telephone->id}") ?></td>
                    <td><?= Html::encode("{$telephone->telephone}") ?></td>
                    <td> <?= $telephone->contact ? '<a href="/contact/show/'.$telephone->contact->id.'">'.Html::encode("{$telephone->contact->name}").'</a>' : '' ?></td>
                    <td><?= $telephone->city ? Html::encode("{$telephone->city->name}") : '' ?></td>
                    <td class="text-right">
                        <a href="/telephone/edit/<?= $telephone->id ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="/telephone/delete/<?= $telephone->id ?>"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>


        <?= LinkPager::widget(['pagination' => $pagination]) ?>


    </div>
</div>
