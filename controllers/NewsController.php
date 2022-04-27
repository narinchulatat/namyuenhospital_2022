<?php

namespace app\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\html;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\helpers\BaseFileHelper;
use app\models\Uploads;
use app\models\NewsCategory;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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

// public function actionIndex(){
//   $searchModel = new NewsSearch();
//
//   //print_r(Yii::$app->request->queryParams);
//
//   $dataProvider = $searchModel->searchNewsall();
//   //$dataProvider->pagination->pageSize = 3;
//   $dataProvider->sort->defaultOrder = ['id'=>'DESC'];
//
//   return $this->render('index',[
//     'searchModel' => $searchModel,
//     'dataProvider' => $dataProvider,
//   ]);
// }
    public function actionIndex(){
      $searchModel = new NewsSearch();
        $cat_id = Yii::$app->request->get('cat_id');
        if(isset($cat_id)){

            $news = NewsCategory::find()->where(['id' => $cat_id])->one();
            //print_r(Yii::$app->request->queryParams);

            $dataProvider = $searchModel->searchNewsall();
            $dataProvider->pagination->pageSize = 10;
            $dataProvider->sort->defaultOrder = ['id'=>'DESC'];

            return $this->render('index',[
              'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
              'news' =>$news
            ]);
        }

    }
    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionAdmin()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->searchNewsadmin(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = ['id'=>'DESC'];

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
     {
        $model = new News();

        if ($model->load(Yii::$app->request->post())) {
          // Uploads File
            $this->CreateDir($model->ref);
            $model->docs = $this->uploadMultipleFile($model);

            $curentDate = date('Y-m-d H:i:s');
            $model->post_date = $curentDate;
            $model->update_date = $curentDate;
            $model->view = 0;

            if($model->save()){
              $model->icon = UploadedFile::getInstance($model,'icon');
              if($model->icon){
                $iconFullName = Yii::getAlias('@webroot').'/uploaded/news/icons/';
                $iconFullName .= $model->id;
                $iconFullName .= '.'.$model->icon->extension;
                $model->icon->saveAs($iconFullName);
              }
              return $this->redirect(['view', 'id' => $model->id]);
            }
          } else {
               $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
          }

          return $this->render('create', [
              'model' => $model,
          ]);
     }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);
    //     $iconExtensions = ['jpg', 'png'];
    //     // Uploads File
    //     $tempDocs     = $model->docs;
    // อันใหม่
    //     if ($model->load(Yii::$app->request->post())) {
    //         $this->CreateDir($model->ref);
    //         $model->docs = $this->uploadMultipleFile($model,$tempDocs);
    //
    //         if($model->save()){
    //           $model->icon = UploadedFile::getInstance($model,'icon');
    //           if($model->icon){
    //             $iconFullName = Yii::getAlias('@webroot').'/uploaded/news/icons/';
    //             $iconFullName .= $model->id;
    //             foreach ($iconExtensions as $key => $exe) {
    //               $iconUnlink = $iconFullName.'.'.$exe;
    //               if(is_file($iconUnlink)){
    //                   unlink($iconUnlink);
    //               }
    //             }
    //             $iconFullName .= '.'.$model->icon->extension;
    //
    //             $model->icon->saveAs($iconFullName);
    //           }
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }else {
    //             return $this->render('update', [
    //                 'model' => $model,
    //             ]);
    //         }
    //     }
// สิ้นสุดอันใหม่
// อันเก่า
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //   $model->icon = UploadedFile::getInstance($model,'icon');
        //   if($model->icon){
        //     $iconFullName = Yii::getAlias('@webroot').'/uploaded/news/icons/';
        //     $iconFullName .= $model->id;
        //     foreach ($iconExtensions as $key => $exe) {
        //       $iconUnlink = $iconFullName.'.'.$exe;
        //       if(is_file($iconUnlink)){
        //           unlink($iconUnlink);
        //       }
        //     }
        //     $iconFullName .= '.'.$model->icon->extension;
        //
        //     $model->icon->saveAs($iconFullName);
        //   }
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
        //     return $this->render('update', [
        //         'model' => $model,
        //     ]);
        // }
        // สิ้นสุดอันเก่า
    // }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tempDocs     = $model->docs;
        if ($model->load(Yii::$app->request->post())) {
            $this->CreateDir($model->ref);
            $model->docs = $this->uploadMultipleFile($model,$tempDocs);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
     public function actionDelete($id)
     {
         $model = $this->findModel($id);
         //remove upload file & data
         $this->removeUploadDir($model->ref);
         Uploads::deleteAll(['ref'=>$model->ref]);

         $model->delete();

         return $this->redirect(['admin']);
     }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeletefile($id,$field,$fileName){
        $status = ['success'=>false];
        if(in_array($field, ['docs'])){
            $model = $this->findModel($id);
            $files =  Json::decode($model->{$field});
            if(array_key_exists($fileName, $files)){
                if($this->deleteFile('file',$model->ref,$fileName)){
                    $status = ['success'=>true];
                    unset($files[$fileName]);
                    $model->{$field} = Json::encode($files);
                    $model->save();
                }
            }
        }
        echo json_encode($status);
    }

    private function deleteFile($type='file',$ref,$fileName){
        if(in_array($type, ['file','thumbnail'])){
            if($type==='file'){
               $filePath = News::getUploadPath().$ref.'/'.$fileName;
            } else {
               $filePath = News::getUploadPath().$ref.'/thumbnail/'.$fileName;
            }
            @unlink($filePath);
            return true;
        }
        else{
            return false;
        }
    }

    // public function actionDownload($id,$file,$file_name){
    //     $model = $this->findModel($id);
    //      if(!empty($model->ref) && !empty($model->docs)){
    //             Yii::$app->response->sendFile($model->getUploadPath().'/'.$model->ref.'/'.$file,$file_name);
    //     }else{
    //         $this->redirect(['/news/view','id'=>$id]);
    //     }
    // }
    public function actionDownload($id, $file, $file_name)
    {
        $model = $this->findModel($id);
        if (!empty($model->ref) && !empty($model->docs)) {
            if (substr($file_name, -3) == 'pdf') {
                return Yii::$app->response->sendFile($model->getUploadPath() . '/' . $model->ref . '/' . $file, $file_name, ['inline' => true]);
            } else {
                Yii::$app->response->sendFile($model->getUploadPath() . '/' . $model->ref . '/' . $file, $file_name);
            }
        } else {
            $this->redirect(['/news/view', 'id' => $id]);
        }
    }

  /**
  * Upload & Rename file
       * @return mixed
       */

       private function uploadSingleFile($model,$tempFile=null){
           $file = [];
           $json = '';
           try {
                $UploadedFile = UploadedFile::getInstance($model,'covenant');
                if($UploadedFile !== null){
                    $oldFileName = $UploadedFile->basename.'.'.$UploadedFile->extension;
                    $newFileName = md5($UploadedFile->basename.time()).'.'.$UploadedFile->extension;
                    $UploadedFile->saveAs(News::UPLOAD_FOLDER.'/'.$model->ref.'/'.$newFileName);
                    $file[$newFileName] = $oldFileName;
                    $json = Json::encode($file);
                }else{
                   $json=$tempFile;
                }
           } catch (Exception $e) {
               $json=$tempFile;
           }
           return $json ;
       }

       private function uploadMultipleFile($model,$tempFile=null){
                $files = [];
                $json = '';
                $tempFile = Json::decode($tempFile);
                $UploadedFiles = UploadedFile::getInstances($model,'docs');
                if($UploadedFiles!==null){
                   foreach ($UploadedFiles as $file) {
                       try {   $oldFileName = $file->basename.'.'.$file->extension;
                               $newFileName = md5($file->basename.time()).'.'.$file->extension;
                               $file->saveAs(News::UPLOAD_FOLDER.'/'.$model->ref.'/'.$newFileName);
                               $files[$newFileName] = $oldFileName ;
                       } catch (Exception $e) {

                       }
                   }
                   $json = json::encode(ArrayHelper::merge($tempFile,$files));
                }else{
                   $json = $tempFile;
                }
               return $json;
       }

       private function CreateDir($folderName){
           if($folderName != NULL){
               $basePath = News::getUploadPath();
               if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
                   BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
               }
           }
           return;
       }

       private function removeUploadDir($dir){
           BaseFileHelper::removeDirectory(News::getUploadPath().$dir);
       }
        /**
         * Upload & Rename file
         * @return mixed
         */

}
