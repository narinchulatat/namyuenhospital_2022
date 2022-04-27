<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use app\models\EventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
              'access' =>[
              'class' => AccessControl::className(),
              'only' => ['index', 'admin', 'view', 'create', 'update', 'delete'],
              'rules' => [
                [
                  'actions' => ['admin', 'create', 'update','delete'],
                  'allow' => true,
                  'roles' => ['@']
                ],
                [
                  'actions' => ['index', 'view'],
                  'allow' => true,
                  'roles' => ['?', '@']
                ]
              ]
            ]
        ];
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionAdmin()
    {
        $events  = Event::find()->all();
        $eventos = [];

        foreach ($events as $event):
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $event->id;
            //$Event->className = 'alert alert-success';
            $Event->backgroundColor = 'rgb(76, 174, 76)';
            $Event->borderColor = 'yellow';
            $Event->title = $event->title.$event->description;
            // $Event->description = $event->description;
            $Event->start = $event->created_date;
            //$Event->end = $event->end;
            $Event->end = date('Y-m-d', strtotime('+1 day', strtotime($event->end)));
            $Event->url = 'index.php?r=event/view&id='.$event->id;
            $eventos[]    = $Event;
        endforeach;

        return $this->render('admin', [
            'events' => $eventos
        ]);
    }
    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($date)
      {
          $model = new Event();
          $model->created_date = $date;

          if ($model->load(Yii::$app->request->post()) && $model->validate()) {

//              echo $model->created_date;
//              echo "<br/>";
//              echo $model->end;
//
//              exit();

              if($model->save()){
                  return $this->redirect(['admin', 'id' => $model->id]);
              }

          } else {
              return $this->renderAjax('create', [
                  'model' => $model,
              ]);
          }
      }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
