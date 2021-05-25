<?php

namespace backend\controllers;

use Yii;
use common\models\Recruitment;
use common\models\search\RecruitmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Employee;
use common\models\Firm;
use common\models\Position;
use common\models\Department;
use yii\helpers\ArrayHelper;

/**
 * RecruitmentController implements the CRUD actions for Recruitment model.
 */
class RecruitmentController extends Controller
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
     * Lists all Recruitment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecruitmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recruitment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Recruitment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recruitment();

        $employee = Employee::find()->all();
        foreach ($employee as &$item)
        {
            $item->full_name = $item->getEmployeeFullName();
        }
        $employee_list = ArrayHelper::map($employee,'id', 'full_name');

        $firm = Firm::find()->all();
        $firm_list = ArrayHelper::map($firm,'id', 'short_name');

        $position = Position::find()->all();
        $position_list = ArrayHelper::map($position,'id', 'name');

        $department = Department::find()->all();
        $department_list = ArrayHelper::map($department,'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'employee_list' => $employee_list,
            'firm_list' => $firm_list,
            'position_list' => $position_list,
            'department_list' => $department_list,
        ]);
    }

    /**
     * Updates an existing Recruitment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $employee = Employee::find()->all();
        foreach ($employee as &$item)
        {
            $item->full_name = $item->getEmployeeFullName();
        }
        $employee_list = ArrayHelper::map($employee,'id', 'full_name');

        $firm = Firm::find()->all();
        $firm_list = ArrayHelper::map($firm,'id', 'short_name');

        $position = Position::find()->all();
        $position_list = ArrayHelper::map($position,'id', 'name');

        $department = Department::find()->all();
        $department_list = ArrayHelper::map($department,'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'employee_list' => $employee_list,
            'firm_list' => $firm_list,
            'position_list' => $position_list,
            'department_list' => $department_list,
        ]);
    }

    /**
     * Deletes an existing Recruitment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recruitment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recruitment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recruitment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
