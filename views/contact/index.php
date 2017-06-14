<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
$this->title = 'Telephone controller';
?>
<div class="site-index">

    <div class="body-content">
        <h1>Contact controller!</h1>
        <a class="btn btn-default" href="/contact/new">Добавить</a>
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Город</th>
                <th class="text-right">Действия</th>

            </tr>
            </thead>
            <tbody class="text-left">
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= Html::encode("{$contact->id}") ?></td>
                    <td><?= Html::encode("{$contact->name}") ?></td>
                    <td><?= $contact->city ? Html::encode("{$contact->city->name}") : '' ?></td>
                    <td class="text-right">
                        <a href="/contact/show/<?= $contact->id ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="/contact/edit/<?= $contact->id ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="/contact/delete/<?= $contact->id ?>"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>


        <?= LinkPager::widget(['pagination' => $pagination]) ?>


    </div>
</div>
