<?php
/**
 * Created by PhpStorm.
 * User: de
 * Date: 14.06.2017
 * Time: 12:04
 */
namespace app\controllers;

use app\models\City;
use app\models\Telephone;
use yii\web\Controller;
use yii\data\Pagination;
use Yii;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

class TelephoneController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'],
                'rules' => [
                    [
                        'actions' => ['*'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex() {

        $query = Telephone::find()->with('city');

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $telephones = $query->orderBy('telephone')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'telephones' => $telephones,
            'pagination' => $pagination,
        ]);
    }


    public function actionNew() {

        $model = new Telephone();
        $items = ArrayHelper::map(City::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('added phone');

            return $this->redirect('/telephone');

        } else {

            return $this->render('new', [
                'model' => $model,
                'items'=>$items,
            ]);
        }
    }

    public function actionNew_for_contact($id) {

        $model = new Telephone();
        $model->contact_id = $id;
        $items = ArrayHelper::map(City::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('added phone');

            return $this->redirect('/contact/show/'.$id);

        } else {

            return $this->render('new', [
                'model' => $model,
                'items'=>$items,
            ]);
        }
    }

    public function actionDelete($id) {

        $model = Telephone::findOne($id);
        $model->delete();
        return $this->redirect(['index']);
    }

    public function actionEdit($id) {

        $model = Telephone::findOne($id);
        $items = ArrayHelper::map(City::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->update()) {

            Yii::$app->session->setFlash('editing city');

            return $this->redirect('/telephone');

        } else {

            return $this->render('new', [
                'model' => $model,
                'items'=>$items,
            ]);
        }

    }

}