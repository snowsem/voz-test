<?php
/**
 * Created by PhpStorm.
 * User: de
 * Date: 14.06.2017
 * Time: 12:04
 */
namespace app\controllers;

use app\models\Contact;
use yii\web\Controller;
use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use app\models\City;
use yii\filters\AccessControl;

class ContactController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'new', 'delete', 'show'],
                'rules' => [
                    [
                        'actions' => ['index', 'new', 'delete', 'show'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex() {

        $query = Contact::find()->with('city');

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $contacts = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'contacts' => $contacts,
            'pagination' => $pagination,
        ]);
    }

    public function actionShow($id) {

        $model = Contact::findOne($id);

        return $this->render('show', ['contact' => $model]);
    }

    public function actionNew() {

        $model = new Contact();
        $items = ArrayHelper::map(City::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('added contact');

            return $this->redirect('/contact');

        } else {

            return $this->render('new', [
                'model' => $model,
                'items'=>$items,
            ]);
        }
    }

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDelete($id) {

        $model = Contact::findOne($id);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id) {

        $model = Contact::findOne($id);
        $items = ArrayHelper::map(City::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->update()) {

            Yii::$app->session->setFlash('editing contact');

            return $this->redirect('/contact');

        } else {

            return $this->render('new', [
                'model' => $model,
                'items'=>$items,
            ]);
        }

    }


}