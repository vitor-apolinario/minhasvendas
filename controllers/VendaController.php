<?php

namespace app\controllers;

use Yii;
use app\models\Venda;
use app\models\VendaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VendaController implements the CRUD actions for Venda model.
 */
class VendaController extends Controller
{
    /**
     * {@inheritdoc}
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
        ];
    }

    /**
     * Lists all Venda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venda model.
     * @param integer $num_venda
     * @param integer $cd_fk_indu
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($num_venda, $cd_fk_indu)
    {
        return $this->render('view', [
            'model' => $this->findModel($num_venda, $cd_fk_indu),
        ]);
    }

    /**
     * Creates a new Venda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venda();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'num_venda' => $model->num_venda, 'cd_fk_indu' => $model->cd_fk_indu]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Venda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $num_venda
     * @param integer $cd_fk_indu
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($num_venda, $cd_fk_indu)
    {
        $model = $this->findModel($num_venda, $cd_fk_indu);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'num_venda' => $model->num_venda, 'cd_fk_indu' => $model->cd_fk_indu]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Venda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $num_venda
     * @param integer $cd_fk_indu
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($num_venda, $cd_fk_indu)
    {
        $this->findModel($num_venda, $cd_fk_indu)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Venda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $num_venda
     * @param integer $cd_fk_indu
     * @return Venda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($num_venda, $cd_fk_indu)
    {
        if (($model = Venda::findOne(['num_venda' => $num_venda, 'cd_fk_indu' => $cd_fk_indu])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
