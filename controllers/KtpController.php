<?php

namespace app\controllers;

use app\models\Pengaturan;
use Yii;
use app\models\Ktp;
use app\models\KtpSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
 * KtpController implements the CRUD actions for Ktp model.
 */
class KtpController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

	
	/**
	 * Lists all Ktp models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new KtpSearch;
		$dataProvider = $searchModel->search($_GET);
		$dataProvider->setSort([
				'defaultOrder' => ['tanggal_buat'=>SORT_DESC],
				]
		);
		Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Ktp model.
	 * @param integer $id
     *
	 * @return mixed
	 */
	public function actionView($id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Ktp model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Ktp;
		$model->rt = $model->getRt();
		$model->rw = $model->getRw();
		$model->tanggal_buat = date('Y-m-d');
		$model->user = \Yii::$app->user->identity->id;
		try {
            if ($model->load($_POST) && $model->save()) {
				Yii::$app->session->addFlash("success", "Data berhasil ditambahkan");
                return $this->redirect(Url::previous());
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', ['model' => $model]);
	}

	/**
	 * Updates an existing Ktp model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
			Yii::$app->session->addFlash("info", "Data berhasil di update");
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Ktp model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
        try {
            $this->findModel($id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$id',',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
			Url::remember(null);
			$url = \Yii::$app->session['__crudReturnUrl'];
			\Yii::$app->session['__crudReturnUrl'] = null;

			return $this->redirect($url);
        } else {
			Yii::$app->session->addFlash("warning", "Data berhasil dihapus");
            return $this->redirect(['index']);
        }
	}
	public function actionFindpenduduk(){
		\Yii::$app->response->format = 'json';
		$id = $_GET["id"];
		return Penduduk::searchByNIK($id);
	}
	/**
	 * Finds the Ktp model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Ktp the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	public function actionSurat($id) {
		$dataktp = Ktp::findOne($id);
		$datadomisili = Pengaturan::find()->one();
		$content = $this->renderPartial('surat', [
				"dataktp" => $dataktp,
				"datadomisili" => $datadomisili
		]);
		//return $content;
		$pdfLandscape = Yii::$app->pdfLandscape;
		$mpdf = $pdfLandscape->api;
		$mpdf->format = 'A4';
		$mpdf->SetMargins(0,0,10);
		$mpdf->WriteHtml($content);
		return $mpdf->Output('Surat Pengantar e-KTP.pdf', 'I');
	}

	protected function findModel($id)
	{
		if (($model = Ktp::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
