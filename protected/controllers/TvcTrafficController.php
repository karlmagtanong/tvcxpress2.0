<?php

class TvcTrafficController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array(
				'allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view'),
				'users' => array('*'),
			),
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create', 'update'),
				'users' => array('@'),
			),
			array(
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin', 'delete', 'updateSched', 'updateStatus', 'updateStatuss'),
				'users' => array('@'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionUpdateStatuss()
	{
		$code = TvcOrder::model()->get_code($_POST['code']);

		// echo $code;
		Yii::app()->db
			->createCommand('UPDATE tvc_traffic SET status = "' . $_POST['statset'] . '" WHERE order_code=:order_code')
			->bindValues([':order_code' => $code])
			->execute();

		if ($_POST['statset'] == 3) {
			$this->emailtrafficrt($code);
		}
	}


	public function emailtrafficissue($code, $form)
	{
		$token = Token::model()->get_code();


		$datas = TvcOrder::model()->findByAttributes(array('order_code' => $code, 'type' => 1));
		$service = ($datas['service_type'] == 1 ? "Transmission" : "Non-Transmission");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{
          "from" :{
            "email": "karl.magtanong@solutiontechnologist.com",
            "name": "TvcXpress Manila"
            },
            "personalizations": [{
              "to" : [{
                "email" : "' . $datas['agency_email'] . '"
                }],
                "content" : "text/html" ,
                "dynamic_template_data":{

                    "subject" : "TRAFFIC NOTIFICATION #' . $datas['order_code'] . '",
                      "order" : "' . $datas['order_code'] . '",
                      "asc_brand" : "' . $datas['asc_brand'] . '",
                      "title" : "' . $datas['asc_project_title'] . '",
                      "len" : "' . $datas['length'] . '",
                      "service" : "' . $service . '",
					  "orderissue":"' . $form . '"

                   }
                }],
                "template_id":"d-f17b0231c333472b8ee156fdeab91a60"
            }');


		$headers = array();
		$headers[] = '"' . $token . '"';
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}

		echo 'Error:' . curl_error($ch);
		curl_close($ch);
	}

	public function emailtrafficrt($code)
	{

		$datas = TvcOrder::model()->findByAttributes(array('order_code' => $code, 'type' => 1));
		$service = ($datas['service_type'] == 1 ? "Transmission" : "Non-Transmission");
		$token = Token::model()->get_code();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{
          "from" :{
            "email": "karl.magtanong@solutiontechnologist.com",
            "name": "TvcXpress Manila"
            },
            "personalizations": [{
              "to" : [{
                "email" : "' . $datas['agency_email'] . '"
                }],
                "content" : "text/html" ,
                "dynamic_template_data":{

                    "subject" : "TRAFFIC NOTIFICATION #' . $datas['order_code'] . '",
                      "order" : "' . $datas['order_code'] . '",
                      "asc_brand" : "' . $datas['asc_brand'] . '",
                      "title" : "' . $datas['asc_project_title'] . '",
                      "len" : "' . $datas['length'] . '",
                      "service" : "' . $service . '"

                   }
                }],
                "template_id":"d-ade7162434064728ab0af237cfb311f9"
            }');


		$headers = array();
		$headers[] = '"' . $token . '"';
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}

		echo 'Error:' . curl_error($ch);
		curl_close($ch);
	}

	public function actionUpdateStatus()
	{
		if ($_POST['statset'] == 1) {
			Yii::app()->db
				->createCommand('UPDATE tvc_traffic SET order_form = "' . $_POST['stat'] . '" WHERE order_code=:order_code')
				->bindValues([':order_code' => $_POST['code']])
				->execute();

			if ($_POST['stat'] == 3) {
				$form = "ORDER FORM";
				$this->emailtrafficissue($_POST['code'], $form);
			}
		}
		if ($_POST['statset'] == 2) {
			Yii::app()->db
				->createCommand('UPDATE tvc_traffic SET material = "' . $_POST['stat'] . '" WHERE order_code=:order_code')
				->bindValues([':order_code' => $_POST['code']])
				->execute();

			if ($_POST['stat'] == 5) {
				$form = "MATERIAL";
				$this->emailtrafficissue($_POST['code'], $form);
			}
		}
		if ($_POST['statset'] == 3) {
			Yii::app()->db
				->createCommand('UPDATE tvc_traffic SET asc_clearance = "' . $_POST['stat'] . '" WHERE order_code=:order_code')
				->bindValues([':order_code' => $_POST['code']])
				->execute();

			if ($_POST['stat'] == 3) {
				$form = "ASC CLEARANCE";
				$this->emailtrafficissue($_POST['code'], $form);
			}
		}
		if ($_POST['statset'] == 4) {
			Yii::app()->db
				->createCommand('UPDATE tvc_traffic SET billing = "' . $_POST['stat'] . '" WHERE order_code=:order_code')
				->bindValues([':order_code' => $_POST['code']])
				->execute();
		}
		if ($_POST['statset'] == 5) {
			Yii::app()->db
				->createCommand('UPDATE tvc_traffic SET status = "' . $_POST['stat'] . '" WHERE order_code=:order_code')
				->bindValues([':order_code' => $_POST['code']])
				->execute();

			if ($_POST['stat'] == 3) {
				$this->emailtrafficrt($_POST['code']);
			}
		}
	}

	public function actionUpdateSched()
	{

		$gettrafficifexist = TvcTraffic::model()->get_ifexist($_POST['code']);


		if ($gettrafficifexist == "") {

			$model = new TvcTraffic;
			$model->order_code = $_POST['code'];
			$model->sched = $_POST['date'];
			$model->save();
		} else {
			Yii::app()->db
				->createCommand('UPDATE tvc_traffic SET sched = "' . $_POST['date'] . '" WHERE order_code=:order_code')
				->bindValues([':order_code' => $_POST['code']])
				->execute();
		}
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new TvcTraffic;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TvcTraffic'])) {
			$model->attributes = $_POST['TvcTraffic'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TvcTraffic'])) {
			$model->attributes = $_POST['TvcTraffic'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('TvcTraffic');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new TvcTraffic('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['TvcTraffic']))
			$model->attributes = $_GET['TvcTraffic'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TvcTraffic the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = TvcTraffic::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TvcTraffic $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'tvc-traffic-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
