<?php

namespace app\controllers;

use app\models\Certificate;
use app\models\CertificateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * CertificateController implements the CRUD actions for Certificate model.
 */
class CertificateController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Certificate models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CertificateSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Certificate model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Certificate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Certificate();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $curentDate = date('Y-m-d H:i:s');
                $model->date_certificate = $curentDate;

                if ($model->save()) {

                    $r = $_POST['Certificate'];

                    $date_certificate = $r['date_certificate'];
                    $fullname = $r['fullname'];
                    $a_1 = $r['a_1'];
                    $a_2 = $r['a_2'];
                    $a_3 = $r['a_3'];
                    $a_4 = $r['a_4'];
                    $fullname_1 = $r['fullname_1'];
                    $fullname_2 = $r['fullname_2'];
                    $fullname_3 = $r['fullname_3'];

                    //------------- begin notify --------------

                    $linetoken = 'qX2J6zpFi1R8wVLZYxUXsoLptMAkPFOmJ2yMOgPZopa';
                    if ($linetoken <> '') {

                        define('LINE_API', "https://notify-api.line.me/api/notify");
                        define('LINE_TOKEN', $linetoken);
                        $getip = Yii::$app->getRequest()->getUserIP();

                        function notify_message($message)
                        {

                            $queryData = array('message' => $message);
                            $queryData = http_build_query($queryData, '', '&');
                            $headerOptions = array(
                                'http' => array(
                                    'method' => 'POST',
                                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                                        . "Authorization: Bearer " . LINE_TOKEN . "\r\n"
                                        . "Content-Length: " . strlen($queryData) . "\r\n",
                                    'content' => $queryData
                                ),
                                "ssl" => array(
                                    "verify_peer" => false,
                                    "verify_peer_name" => false,
                                ),
                            );

                            $context = stream_context_create($headerOptions);
                            $result = file_get_contents(LINE_API, FALSE, $context);
                            $res = json_decode($result);
                        }

                        $res = notify_message('วันที่ขอหนังสือ ' . $date_certificate . ' ผู้ยื่นคำขอ: ' . $fullname . ' หนังสือรับรองเงินเดือน ' . $a_1 . ' ฉบับ สำเนาสัญญาจ้าง: ' . $a_2 . ' ฉบับ สำเนาคำสั่งจ้าง: ' . $a_3 . ' ฉบับ อื่นๆ ' . $a_4 . ' ฉบับ รายชื่อผู้ขอคนที่ 1: ' . $fullname_1 . ' รายชื่อผู้ขอคนที่ 2: ' . $fullname_2 . ' รายชื่อผู้ขอคนที่ 3: ' . $fullname_3);
                    }
                    //------------- end notify --------------

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Certificate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Certificate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Certificate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Certificate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Certificate::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
