<?php

namespace app\controllers;

use Yii;
use app\models\Slide;
use app\models\SlideSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' =>[
              'class' => AccessControl::className(),
              'only' => ['index', 'index', 'view', 'create', 'update', 'delete'],
              'rules' => [
                [
                  'actions' => ['index', 'create', 'update','delete'],
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
     * Lists all Slide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slide model.
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
     * Creates a new Slide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
     {
         $model = new Slide();

         if($model->load(Yii::$app->request->post())){

             try{
                 $model->image = UploadedFile::getInstance($model, 'image');
                 $model->image = $model->uploadImage(); //method return ชื่อไฟล์
                 $model->save();//บันทึกข้อมูล
                 /*var_dump($model);
                 die();*/
                 Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                 return $this->redirect(['index']);
             }catch(Exception $e){
                 Yii::$app->session->setFlash('danger', 'มีข้อผิดพลาด');
                 return $this->redirect(['index']);
             }
         }

         return $this->render('create', [
             'model' => $model,
         ]);
     }

     public function actionUpdate($id)
     {
         $model = $this->loadModel($id);
         if($model->load(Yii::$app->request->post())){
             try{
                 $model->image = UploadedFile::getInstance($model, 'image');
                 $model->image = $model->uploadImage();//method return ชื่อไฟล์
                 $model->save();//บันทึกข้อมูล
                 Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                 return $this->redirect(['index']);
             }catch(Exception $e){
                 Yii::$app->session->setFlash('danger', 'มีข้อผิดพลาด');
                 return $this->redirect(['index']);
             }
         }
         return $this->render('update', [
             'model' => $model
         ]);
     }

    /**
     * Deletes an existing Slide model.
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
     * Finds the Slide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slide::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function loadModel($id)
    {
        $model = Slide::findOne($id);
        if(!$model){
            throw new \Exception("Error Processing Request", 1);
        }
        return $model;
    }

}
