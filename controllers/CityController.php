<?php
/**
 * Created by PhpStorm.
 * User: de
 * Date: 14.06.2017
 * Time: 12:04
 */
namespace app\controllers;
use Yii;
use app\models\City;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\AccessControl;


class CityController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex() {

        $query = City::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $city = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'cities' => $city,
            'pagination' => $pagination,
        ]);
    }

    public function actionNew() {

        $model = new City();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('added city');

            return $this->redirect('/city');

        } else {

            return $this->render('new', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id) {

        $model = City::findOne($id);
        $model->delete();
        return $this->redirect(['index']);
    }

    public function actionEdit($id) {

        $model = City::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->update()) {

            Yii::$app->session->setFlash('editing city');

            return $this->redirect('/city');

        } else {

            return $this->render('new', [
                'model' => $model,
            ]);
        }

    }

}