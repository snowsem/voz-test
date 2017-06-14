<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
$this->title = 'City controller';
?>
<div class="site-index">

    <div class="body-content">
        <h1>City controller!</h1>
        <a class="btn btn-default" href="/city/new">Добавить</a>
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Наименование</th>
                <th class="text-right">Действия</th>

            </tr>
            </thead>
            <tbody class="text-left">
            <?php foreach ($cities as $city): ?>
                <tr>
                    <td><?= Html::encode("{$city->id}") ?></td>
                    <td><?= Html::encode("{$city->name}") ?></td>
                    <td class="text-right">
                        <a href="/city/edit/<?= $city->id ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="/city/delete/<?= $city->id ?>"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>


        <?= LinkPager::widget(['pagination' => $pagination]) ?>


    </div>
</div>
