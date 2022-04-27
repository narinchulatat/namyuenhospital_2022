<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\SqlDataProvider;
use app\models\News;
use app\models\NewsSearch;
use app\models\Freelance;
use app\models\FreelanceSearch;
use app\models\PhotoLibrarySearch;
use yii\data\ActiveDataProvider;
use app\models\Event;
use app\models\EventSearch;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {

        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 4;
        $dataProvider->sort->defaultOrder = ['id' => 'DESC'];

        $newswork = $searchModel->searchNewswork();
        $newswork->pagination->pageSize = 4;
        $newswork->sort->defaultOrder = ['id' => 'DESC'];

        $newspurchase = $searchModel->searchNewspurchase();
        $newspurchase->pagination->pageSize = 4;
        $newspurchase->sort->defaultOrder = ['id' => 'DESC'];

        $newsplan = $searchModel->searchNewsplan();
        $newsplan->pagination->pageSize = 4;
        $newsplan->sort->defaultOrder = ['id' => 'DESC'];

        $searchModel = new PhotoLibrarySearch();
        $dataProvider2 = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider2->pagination->pageSize = 8;
        $dataProvider2->sort->defaultOrder = ['id'=>'DESC'];

        $searchModel = new FreelanceSearch();
        $dataProvider3 = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider3->sort->defaultOrder = ['id'=>'DESC'];

        $events  = Event::find()->all();
        $eventos = [];

        foreach ($events as $event):
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $event->id;
            //$Event->className = 'alert alert-success';
            $Event->backgroundColor = 'rgb(76, 174, 76)';
            // $Event->borderColor = 'yellow';
            $Event->title = $event->title;
            // $Event->description = $event->description;
            $Event->start = $event->created_date;
            $Event->end = date('Y-m-d', strtotime('+1 day', strtotime($event->end)));
            //$Event->url = 'index.php?r=event/view&id='.$event->id;
            $eventos[]    = $Event;
        endforeach;

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'dataProvider2' => $dataProvider2,
                    'newswork' => $newswork,
                    'newspurchase' => $newspurchase,
                    'newsplan' => $newsplan,
                    'events' => $eventos,
                    'dataProvider3' => $dataProvider3,
        ]);
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionStory() {
        return $this->render('story');
    }

    public function actionVision_mission() {
        return $this->render('vision_mission');
    }

    public function actionStructure() {
        return $this->render('structure');
    }

    public function actionPersonnel() {
        return $this->render('personnel');
    }

    public function actionMap() {
        return $this->render('map');
    }

    public function actionPolicy_plan() {
        return $this->render('policy_plan');
    }

    public function actionService() {
        return $this->render('service');
    }

    public function actionDhdcservice() {
        return $this->render('dhdcservice');
    }

    public function actionHa() {
        return $this->render('ha');
    }
    // public function actionUpload()
    //     {
    //       $uploadedFile = UploadedFile::getInstanceByName('upload');
    //       $mime = \yii\helpers\FileHelper::getMimeType($uploadedFile->tempName);
    //       $file = time()."_".$uploadedFile->name;
    //
    //       $user_id = Yii::$app->user->getId();
    //
    //       $url = Yii::$app->urlManager->createAbsoluteUrl('/uploads/'.$user_id.'/'.$file);
    //       $uploadPath = Yii::getAlias('@webroot').'/uploads/'.$user_id.'/'.$file;
    //
    //       if (!is_dir(Yii::getAlias('@webroot').'/uploads/'.$user_id)) { //ถ้ายังไม่มี folder ให้สร้าง folder ตาม user id
    //         mkdir(Yii::getAlias('@webroot').'/uploads/'.$user_id);
    //       }
    //
    //       //ตรวจสอบ
    //       if ($uploadedFile==null)
    //       {
    //         $message = "ไม่มีไฟล์ที่ Upload";
    //       }
    //         else if ($uploadedFile->size == 0)
    //       {
    //         $message = "ไฟล์มีขนาด 0";
    //       }
    //         else if ($mime!="image/jpeg" && $mime!="image/png" && $mime != "image/gif")
    //       {
    //         $message = "รูปภาพควรเป็น JPG หรือ PNG";
    //       }
    //         else if ($uploadedFile->tempName==null)
    //       {
    //         $message = "มีข้อผิดพลาด";
    //       }
    //         else
    //       {
    //         $message = ""; $move = $uploadedFile->saveAs($uploadPath); if(!$move)
    //         {
    //           $message = "ไม่สามารถนำไฟล์ไปไว้ใน Folder ได้กรุณาตรวจสอบ Permission Read/Write/Modify";
    //         }
    //       }
    //         $funcNum = $_GET['CKEditorFuncNum'] ;
    //         echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    //       }
}
