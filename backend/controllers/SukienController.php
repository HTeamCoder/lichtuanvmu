<?php

namespace backend\controllers;

use Yii;
use common\components\read;
use common\models\sukien;
use common\models\tuan;
use common\models\SukienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * SukienController implements the CRUD actions for sukien model.
 */
class SukienController extends Controller
{
    public function behaviors()
    {
       return [
         'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all sukien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SukienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single sukien model.
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
     * Creates a new sukien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new sukien();
        $model->file = UploadedFile::getInstance($model,'file');
        if ($model->file) {
            $word = new read();
            $thoigians =  $word->toHTML($model->file->tempName);
            $tuan = $word->toText($model->file->tempName);
             if (!(is_null(tuan::findOne(['tuannamhoc'=>$tuan['tuannamhoc'],'tuannam'=>$tuan['tuannam']]))))
             {
                 \Yii::$app->session->addFlash('warning', 'Lịch <strong>'.$tuan['tuannamhoc'].'</strong> đã tồn tại và không thể import thêm');
                return $this->redirect(['index']);
             }
            $tuancongtac = new tuan();
            $tuancongtac->tuannam = $tuan['tuannam'];
            $tuancongtac->tuannamhoc = $tuan['tuannamhoc'];
            $tuancongtac->tungay = $tuan['tungay'];
            $tuancongtac->denngay = $tuan['denngay'];
            $tuancongtac->save();

            foreach ($thoigians as $key => $value) {
                if ($key!='ghichu')
                {
                    $sukien = new sukien();
                    $sukien->thoigian = $value['ngay'];
                    $sukien->thoidiem = $value['thoigian'];
                    $sukien->diadiem_congviec = $value['noidung'];
                    $sukien->ghichu = $thoigians['ghichu']['ghichu'];
                    $sukien->tuan_id = $tuancongtac->id;
                    $sukien->save(false);
                }
            }
            \Yii::$app->session->addFlash('success', 'Import file dữ liệu thành công');
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing sukien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing sukien model.
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
     * Finds the sukien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return sukien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = sukien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
