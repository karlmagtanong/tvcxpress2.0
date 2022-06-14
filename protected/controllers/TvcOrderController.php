<?php

class TvcOrderController extends Controller
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
				'actions' => array('admin', 'delete'),
				'users' => array('@'),
			),
			array(
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('advertiser'),
				'users' => array('@'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionAdvertiser()
	{
		$data = TvcMgmtAdvertiser::model()->search()->getData();
		$datas = array();
		foreach ($data as $val) {
			$datas[] .= $val['name'];
		}

		echo json_encode($datas);
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
		$model = new TvcOrder;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TvcOrder'])) {

			$uniqid = uniqid();

			$model->attributes = $_POST['TvcOrder'];

			$model->break_date = $_POST['TvcOrder']['break_date'] == "" ? NULL : $_POST['TvcOrder']['break_date'];
			$model->share_date = $_POST['TvcOrder']['share_date'] == "" ? NULL : $_POST['TvcOrder']['share_date'];
			$model->asc_date = $_POST['TvcOrder']['asc_date'] == "" ? NULL : $_POST['TvcOrder']['asc_date'];
			$model->asc_valid_from = $_POST['TvcOrder']['asc_valid_from'] == "" ? NULL : $_POST['TvcOrder']['asc_valid_from'];
			$model->asc_valid_to = $_POST['TvcOrder']['asc_valid_to'] == "" ? NULL : $_POST['TvcOrder']['asc_valid_to'];
			$model->order_id = $uniqid;
			$model->type = 1;
			$model->created_by = 1;
			$model->created_at = date("Y-m-d");
			$model->save();



			if ($_POST['share_link'] != "") {
				$s = 0;
				foreach ($_POST['share_link'] as $val) {
					$sharelink = new TvcOrderShareLink;
					$sharelink->order_id = $uniqid;
					$sharelink->share_link = $_POST['share_link'][$s];
					$sharelink->save();
					$s++;
				}
			}

			$grandtotal = 0.0;
			if ($_POST['TvcOrder']['service_type'] == 1) {
				$c = 0;

				foreach ($_POST['channel'] as $val) {
					$channelorder = new TvcOrderChannel;
					$channelorder->order_id = $uniqid;
					$channelorder = new TvcOrderChannel;
					$channelorder->channel_id = $_POST['channel'][$c];
					$channelorder->cluster_id = TvcMgmtChannel::model()->get_cluster_id($_POST['channel'][$c]);
					$channelorder->price = TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
					$channelorder->save();
					$c++;
				}
			}
			if ($_POST['TvcOrder']['service_type'] == 2) {
				$n = 0;
				foreach ($_POST['non_tran']['id'] as $val) {
					$channelnontran = new TvcOrderServices;
					$channelnontran->order_id = $uniqid;
					$channelnontran->sub_cat_id = $_POST['non_tran']['id'][$n];
					$channelnontran->qty = $_POST['non_tran']['qty'][$n];
					$channelnontran->price = TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
					$channelnontran->cat_id = TvcMgmtExtraServicesSub::model()->get_cat_id($_POST['non_tran']['id'][$n]);
					$channelnontran->save();
					$n++;
				}
			}






			if (!empty($_FILES['po_file']['name'])) {
				$po = 0;
				foreach ($_FILES['po_file']['name'] as $val) {
					$targetDir = 'attachments/upload_pdf/';
					$fileName = basename($_FILES['po_file']['name'][$po]);
					$targetFilePath = $targetDir . $fileName;
					$size = filesize($_FILES['po_file']['tmp_name']); // bytes
					$fileType = pathinfo($fileName, PATHINFO_EXTENSION);


					if (move_uploaded_file($_FILES['po_file']['tmp_name'][$po], $targetFilePath)) {
						$attachment = new TvcOrderAttachment;
						$attachment->order_id = $uniqid;
						$attachment->filename = $fileName;
						$attachment->path = $targetFilePath;
						$attachment->filesize = $size;
						$attachment->format = $fileType;
						$attachment->save();

						echo "success";
					} else {
						echo "error asdasd";
					}

					$po++;
				}
			}

			if (!empty($_FILES['material_file']['name'])) {
				$po = 0;
				foreach ($_FILES['material_file']['name'] as $val) {
					$targetDir = 'attachments/materials/';
					$fileName = basename($_FILES['material_file']['name'][$po]);
					$targetFilePath = $targetDir . $fileName;
					$size = filesize($_FILES['material_file']['tmp_name']); // bytes
					$fileType = pathinfo($fileName, PATHINFO_EXTENSION);


					if (move_uploaded_file($_FILES['material_file']['tmp_name'][$po], $targetFilePath)) {
						$attachment = new TvcOrderAttachment;
						$attachment->order_id = $uniqid;
						$attachment->filename = $fileName;
						$attachment->path = $targetFilePath;
						$attachment->filesize = $size;
						$attachment->format = $fileType;
						$attachment->save();

						echo "success";
					} else {
						echo "error asdasd";
					}

					$po++;
				}
			}

			if (!empty($_FILES['asc_file']['name'])) {
				$po = 0;
				foreach ($_FILES['asc_file']['name'] as $val) {
					$targetDir = 'attachments/asc_clearance/';
					$fileName = basename($_FILES['asc_file']['name'][$po]);
					$targetFilePath = $targetDir . $fileName;
					$size = filesize($_FILES['asc_file']['tmp_name']); // bytes
					$fileType = pathinfo($fileName, PATHINFO_EXTENSION);


					if (move_uploaded_file($_FILES['asc_file']['tmp_name'][$po], $targetFilePath)) {
						$attachment = new TvcOrderAttachment;
						$attachment->order_id = $uniqid;
						$attachment->filename = $fileName;
						$attachment->path = $targetFilePath;
						$attachment->filesize = $size;
						$attachment->format = $fileType;
						$attachment->save();

						echo "success";
					} else {
						echo "error asdasd";
					}

					$po++;
				}
			}




			// print_r($_FILES);
			// print_r($_POST);



			// print_r($_POST);
			// $model->attributes=$_POST['TvcOrder'];
			// if($model->save())
			// 	$this->redirect(array('view','id'=>$model->id));

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

		Yii::app()->db
			->createCommand("UPDATE tvc_order SET type = 4 WHERE order_id=:order_id")
			->bindValues(array(':order_id' => $_POST['TvcOrder']['order_id']))
			->execute();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$models = new TvcOrder;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TvcOrder'])) {

			$uniqid = uniqid();

			$models->attributes = $_POST['TvcOrder'];

			$models->break_date = $_POST['TvcOrder']['break_date'] == "" ? NULL : $_POST['TvcOrder']['break_date'];
			$models->share_date = $_POST['TvcOrder']['share_date'] == "" ? NULL : $_POST['TvcOrder']['share_date'];
			$models->asc_date = $_POST['TvcOrder']['asc_date'] == "" ? NULL : $_POST['TvcOrder']['asc_date'];
			$models->asc_valid_from = $_POST['TvcOrder']['asc_valid_from'] == "" ? NULL : $_POST['TvcOrder']['asc_valid_from'];
			$models->asc_valid_to = $_POST['TvcOrder']['asc_valid_to'] == "" ? NULL : $_POST['TvcOrder']['asc_valid_to'];
			$models->order_id = $uniqid;
			$models->type = 1;
			$models->created_by = 1;
			$models->created_at = date("Y-m-d");
			$models->save();



			if ($_POST['share_link'] != "") {
				$s = 0;
				foreach ($_POST['share_link'] as $val) {
					$sharelink = new TvcOrderShareLink;
					$sharelink->order_id = $uniqid;
					$sharelink->share_link = $_POST['share_link'][$s];
					$sharelink->save();
					$s++;
				}
			}

			$grandtotal = 0.0;
			if ($_POST['TvcOrder']['service_type'] == 1) {
				$c = 0;

				foreach ($_POST['channel'] as $val) {
					$channelorder = new TvcOrderChannel;
					$channelorder->order_id = $uniqid;
					$channelorder = new TvcOrderChannel;
					$channelorder->channel_id = $_POST['channel'][$c];
					$channelorder->cluster_id = TvcMgmtChannel::model()->get_cluster_id($_POST['channel'][$c]);
					$channelorder->price = TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
					$channelorder->save();
					$c++;
				}
			}
			if ($_POST['TvcOrder']['service_type'] == 2) {
				$n = 0;
				foreach ($_POST['non_tran']['id'] as $val) {
					$channelnontran = new TvcOrderServices;
					$channelnontran->order_id = $uniqid;
					$channelnontran->sub_cat_id = $_POST['non_tran']['id'][$n];
					$channelnontran->qty = $_POST['non_tran']['qty'][$n];
					$channelnontran->price = TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
					$channelnontran->cat_id = TvcMgmtExtraServicesSub::model()->get_cat_id($_POST['non_tran']['id'][$n]);
					$channelnontran->save();
					$n++;
				}
			}






			if (!empty($_FILES['po_file']['name'])) {
				$po = 0;
				foreach ($_FILES['po_file']['name'] as $val) {
					$targetDir = 'attachments/upload_pdf/';
					$fileName = basename($_FILES['po_file']['name'][$po]);
					$targetFilePath = $targetDir . $fileName;
					$size = filesize($_FILES['po_file']['tmp_name']); // bytes
					$fileType = pathinfo($fileName, PATHINFO_EXTENSION);


					if (move_uploaded_file($_FILES['po_file']['tmp_name'][$po], $targetFilePath)) {
						$attachment = new TvcOrderAttachment;
						$attachment->order_id = $uniqid;
						$attachment->filename = $fileName;
						$attachment->path = $targetFilePath;
						$attachment->filesize = $size;
						$attachment->format = $fileType;
						$attachment->save();

						echo "success";
					} else {
						echo "error asdasd";
					}

					$po++;
				}
			}

			if (!empty($_FILES['material_file']['name'])) {
				$po = 0;
				foreach ($_FILES['material_file']['name'] as $val) {
					$targetDir = 'attachments/materials/';
					$fileName = basename($_FILES['material_file']['name'][$po]);
					$targetFilePath = $targetDir . $fileName;
					$size = filesize($_FILES['material_file']['tmp_name']); // bytes
					$fileType = pathinfo($fileName, PATHINFO_EXTENSION);


					if (move_uploaded_file($_FILES['material_file']['tmp_name'][$po], $targetFilePath)) {
						$attachment = new TvcOrderAttachment;
						$attachment->order_id = $uniqid;
						$attachment->filename = $fileName;
						$attachment->path = $targetFilePath;
						$attachment->filesize = $size;
						$attachment->format = $fileType;
						$attachment->save();

						echo "success";
					} else {
						echo "error asdasd";
					}

					$po++;
				}
			}

			if (!empty($_FILES['asc_file']['name'])) {
				$po = 0;
				foreach ($_FILES['asc_file']['name'] as $val) {
					$targetDir = 'attachments/asc_clearance/';
					$fileName = basename($_FILES['asc_file']['name'][$po]);
					$targetFilePath = $targetDir . $fileName;
					$size = filesize($_FILES['asc_file']['tmp_name']); // bytes
					$fileType = pathinfo($fileName, PATHINFO_EXTENSION);


					if (move_uploaded_file($_FILES['asc_file']['tmp_name'][$po], $targetFilePath)) {
						$attachment = new TvcOrderAttachment;
						$attachment->order_id = $uniqid;
						$attachment->filename = $fileName;
						$attachment->path = $targetFilePath;
						$attachment->filesize = $size;
						$attachment->format = $fileType;
						$attachment->save();

						echo "success";
					} else {
						echo "error asdasd";
					}

					$po++;
				}
			}




			// print_r($_FILES);
			// print_r($_POST);



			// print_r($_POST);
			// $model->attributes=$_POST['TvcOrder'];
			// if($model->save())
			// 	$this->redirect(array('view','id'=>$model->id));

			$this->redirect(array('view', 'id' => $models->id));
		}

		$this->render('update', array(
			'model' => $model,
			'models' => $models,
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
		$dataProvider = new CActiveDataProvider('TvcOrder');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new TvcOrder('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['TvcOrder']))
			$model->attributes = $_GET['TvcOrder'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TvcOrder the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = TvcOrder::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TvcOrder $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'tvc-order-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
