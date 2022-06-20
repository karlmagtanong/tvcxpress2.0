<?php

class TvcOrderController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     *             using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return [
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        ];
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     *
     * @return array access control rules
     */
    public function accessRules()
    {
        return [
            [
                'allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => ['index', 'view'],
                'users' => ['*'],
            ],
            [
                'allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => ['create', 'save', 'update'],
                'users' => ['@'],
            ],
            [
                'allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => ['admin', 'admin_save', 'delete', 'costestimate', 'Compute_estimate', 'viewsaved', 'updatesaved', 'SaveHistory', 'viewsummary', 'viewtraffic'],
                'users' => ['@'],
            ],
            [
                'allow',
                'actions' => ['email_order'],
                'users' => ['@'],
            ],
            [
                'allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => ['advertiser'],
                'users' => ['@'],
            ],
            [
                'deny',  // deny all users
                'users' => ['*'],
            ],
        ];
    }
    public function emailorder($code)
    {

        $datas = TvcOrder::model()->findByAttributes(array('order_code' => $code, 'type' => 1));
        $userdata = Users::model()->findByAttributes(array('username' => Yii::app()->user->name));
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

                    "subject" : "ORDER CONFIRMATION #' . $datas['order_code'] . '",
                    "name" : "' . $userdata['name'] . '",
                      "order" : "' . $datas['order_code'] . '",
                      "asc_brand" : "' . $datas['asc_brand'] . '",
                      "title" : "' . $datas['asc_project_title'] . '",
                      "len" : "' . $datas['length'] . '",
                      "service" : "' . $service . '",

                   }
                }],
                "template_id":"d-1057a51751bf44a18caee0825d106e39"
            }');


        $headers = array();
        $headers[] = 'Authorization: Bearer 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';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        echo 'Error:' . curl_error($ch);
        curl_close($ch);
    }

    public function actionSaveHistory()
    {
        $model = new TvcOrder();

        Yii::app()->db
            ->createCommand('UPDATE tvc_order SET type = 5 WHERE order_id=:order_id')
            ->bindValues([':order_id' => $_POST['TvcOrder']['order_id']])
            ->execute();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        // echo 'asdasd';
        if (isset($_POST['TvcOrder'])) {
            $uniqid = uniqid();

            $model->attributes = $_POST['TvcOrder'];
            $model->order_code = 'ORDER-' . strtoupper(uniqid());
            $model->break_date = $_POST['TvcOrder']['break_date'] == '' ? null : $_POST['TvcOrder']['break_date'];
            $model->share_date = $_POST['TvcOrder']['share_date'] == '' ? null : $_POST['TvcOrder']['share_date'];
            $model->asc_date = $_POST['TvcOrder']['asc_date'] == '' ? null : $_POST['TvcOrder']['asc_date'];
            $model->asc_valid_from = $_POST['TvcOrder']['asc_valid_from'] == '' ? null : $_POST['TvcOrder']['asc_valid_from'];
            $model->asc_valid_to = $_POST['TvcOrder']['asc_valid_to'] == '' ? null : $_POST['TvcOrder']['asc_valid_to'];
            $model->order_id = $uniqid;
            $model->type = 3;
            $model->created_by = 1;
            $model->created_at = date('Y-m-d');
            $model->save();

            if ($_POST['share_link'] != '') {
                $s = 0;
                foreach ($_POST['share_link'] as $val) {
                    $sharelink = new TvcOrderShareLink();
                    $sharelink->order_id = $uniqid;
                    $sharelink->share_link = $_POST['share_link'][$s];
                    $sharelink->save();
                    ++$s;
                }
            }

            $grandtotal = 0.0;
            if ($_POST['TvcOrder']['service_type'] == 1) {
                $c = 0;
                $total = 0.0;
                foreach ($_POST['channel'] as $val) {
                    $total += TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);

                    $channelorder = new TvcOrderChannel();
                    $channelorder->order_id = $uniqid;
                    $channelorder->channel_id = $_POST['channel'][$c];
                    $channelorder->cluster_id = TvcMgmtChannel::model()->get_cluster_id($_POST['channel'][$c]);
                    $channelorder->price = TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
                    $channelorder->save();
                    ++$c;
                }
                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
            }
            if ($_POST['TvcOrder']['service_type'] == 2) {
                $n = 0;
                $total = 0.0;
                foreach ($_POST['non_tran']['id'] as $val) {
                    $total += TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran = new TvcOrderServices();
                    $channelnontran->order_id = $uniqid;
                    $channelnontran->sub_cat_id = $_POST['non_tran']['id'][$n];
                    $channelnontran->qty = $_POST['non_tran']['qty'][$n];
                    $channelnontran->price = TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran->cat_id = TvcMgmtExtraServicesSub::model()->get_cat_id($_POST['non_tran']['id'][$n]);
                    $channelnontran->save();
                    ++$n;
                }
                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 1;
                        $attachment->save();

                        // echo 'success';
                    } else {
                        // echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 2;
                        $attachment->save();

                        // echo 'success';
                    } else {
                        // echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 3;
                        $attachment->save();

                        // echo 'success';
                    } else {
                        // echo 'error asdasd';
                    }

                    ++$po;
                }
            }

            if (isset($_POST['materialid'])) {
                $m = 0;
                foreach ($_POST['materialid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['materialid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['materialid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['materialid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['materialid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['materialid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            if (isset($_POST['poid'])) {
                $m = 0;
                foreach ($_POST['poid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['poid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['poid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['poid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['poid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['poid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            if (isset($_POST['ascclid'])) {
                $m = 0;
                foreach ($_POST['ascclid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['ascclid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['ascclid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['ascclid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['ascclid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['ascclid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            // print_r($_FILES);
            // print_r($_POST);

            // print_r($_POST);
            // $model->attributes=$_POST['TvcOrder'];
            // if($model->save())
            // 	$this->redirect(array('view','id'=>$model->id));
            // echo 'asdasd'.json_encode($model->getErrors());

            echo $model->id;
            // $this->redirect(['view', 'id' => $model->id]);
        }

        // $this->render('create', [
        //     'model' => $model,
        // ]);
    }

    public function actionUpdatesaved($id)
    {
        $model = $this->loadModel($id);

        Yii::app()->db
            ->createCommand('UPDATE tvc_order SET type = 4 WHERE order_id=:order_id')
            ->bindValues([':order_id' => $_POST['TvcOrder']['order_id']])
            ->execute();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $models = new TvcOrder();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TvcOrder'])) {
            $uniqid = uniqid();

            $models->attributes = $_POST['TvcOrder'];

            $models->break_date = $_POST['TvcOrder']['break_date'] == '' ? null : $_POST['TvcOrder']['break_date'];
            $models->share_date = $_POST['TvcOrder']['share_date'] == '' ? null : $_POST['TvcOrder']['share_date'];
            $models->asc_date = $_POST['TvcOrder']['asc_date'] == '' ? null : $_POST['TvcOrder']['asc_date'];
            $models->asc_valid_from = $_POST['TvcOrder']['asc_valid_from'] == '' ? null : $_POST['TvcOrder']['asc_valid_from'];
            $models->asc_valid_to = $_POST['TvcOrder']['asc_valid_to'] == '' ? null : $_POST['TvcOrder']['asc_valid_to'];
            $models->order_id = $uniqid;
            $models->type = 1;
            $models->created_by = 1;
            $models->created_at = date('Y-m-d');
            $models->save();

            if ($_POST['share_link'] != '') {
                $s = 0;
                foreach ($_POST['share_link'] as $val) {
                    $sharelink = new TvcOrderShareLink();
                    $sharelink->order_id = $uniqid;
                    $sharelink->share_link = $_POST['share_link'][$s];
                    $sharelink->save();
                    ++$s;
                }
            }

            $grandtotal = 0.0;
            if ($_POST['TvcOrder']['service_type'] == 1) {
                $c = 0;
                $total = 0.0;
                foreach ($_POST['channel'] as $val) {
                    $total += TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
                    $channelorder = new TvcOrderChannel();
                    $channelorder->order_id = $uniqid;
                    $channelorder->channel_id = $_POST['channel'][$c];
                    $channelorder->cluster_id = TvcMgmtChannel::model()->get_cluster_id($_POST['channel'][$c]);
                    $channelorder->price = TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
                    $channelorder->save();
                    ++$c;
                }
                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
            }
            if ($_POST['TvcOrder']['service_type'] == 2) {
                $n = 0;
                $total = 0.0;
                foreach ($_POST['non_tran']['id'] as $val) {
                    $total += TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran = new TvcOrderServices();
                    $channelnontran->order_id = $uniqid;
                    $channelnontran->sub_cat_id = $_POST['non_tran']['id'][$n];
                    $channelnontran->qty = $_POST['non_tran']['qty'][$n];
                    $channelnontran->price = TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran->cat_id = TvcMgmtExtraServicesSub::model()->get_cat_id($_POST['non_tran']['id'][$n]);
                    $channelnontran->save();
                    ++$n;
                }
                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 1;
                        $attachment->save();

                        echo 'success';
                    } else {
                        echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 2;
                        $attachment->save();

                        echo 'success';
                    } else {
                        echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 3;
                        $attachment->save();

                        echo 'success';
                    } else {
                        echo 'error asdasd';
                    }

                    ++$po;
                }
            }

            if (isset($_POST['materialid'])) {
                $m = 0;
                foreach ($_POST['materialid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['materialid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['materialid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['materialid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['materialid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['materialid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            if (isset($_POST['poid'])) {
                $m = 0;
                foreach ($_POST['poid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['poid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['poid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['poid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['poid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['poid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            if (isset($_POST['ascclid'])) {
                $m = 0;
                foreach ($_POST['ascclid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['ascclid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['ascclid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['ascclid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['ascclid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['ascclid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }
            // print_r($_FILES);
            // print_r($_POST);

            // print_r($_POST);
            // $model->attributes=$_POST['TvcOrder'];
            // if($model->save())
            // 	$this->redirect(array('view','id'=>$model->id));

            $this->redirect(['view', 'id' => $models->id]);
        }

        $this->render('updatesaved', [
            'model' => $model,
            'models' => $models,
        ]);
    }


    public function actionAdvertiser()
    {
        $data = TvcMgmtAdvertiser::model()->search()->getData();
        $datas = [];
        $i = 1;

        // foreach ($data as $key => $val) {
        //     // implode(', ', $Array)
        //     echo json_encode([$val['name'] => $key]);
        // }
        foreach ($data as $val) {
            // $datas .= '{'.$val['name'].':'.$i.'}';
            $datas['suggestion'] = [$val['name']];

            // echo json_encode($val['name']);
            // unset($datas[0]);

            ++$i;
        }

        echo '{"suggestion":["TEST ADVERTISER"]}';
        // $json_object = $json;
        // $array_data = json_decode($json_object, true);

        // foreach ($array_data as $data) {
        //     foreach ($data as $key => $value) {
        //         $array_key[] = [$key => $value];
        //         $array_value[] = $value;
        //     }
        // }

        // $final_key = implode(',', $array_key);
        // $final_value = implode(',', $array_value);

        // echo json_encode($array_key);
        // $asdasdasd = implode($final_key);
        // echo $asdasdasd;
    }

    /**
     * Displays a particular model.
     *
     * @param int $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', [
            'model' => $this->loadModel($id),
        ]);
    }
    public function actionViewsummary($id)
    {
        $this->render('viewsummary', [
            'model' => $this->loadModel($id),
        ]);
    }

    public function actionViewtraffic($id)
    {
        $this->render('viewtraffic', [
            'model' => $this->loadModel($id),
        ]);
    }

    public function actionViewsaved($id)
    {
        $this->render('viewsaved', [
            'model' => $this->loadModel($id),
        ]);
    }

    public function actionCostestimate()
    {
        $model = new TvcOrder();

        $this->render('costestimate', [
            'model' => $model,
        ]);
    }

    public function actionCompute_estimate()
    {
        $servicetype = $_POST['TvcOrder']['service_type'];
        $result = array();
        $result['servicetype'] = $servicetype;


        if ($servicetype == 1) {
            echo "<h3>TRANSMISSION - TV</h3>";
            echo '<table class="table align-items-center" style="font-size:10px;padding:1px;border-spacing: 5px;">
            <thead class="thead-light">
                <tr style="background-color: ##8898aa;">
                    <th>PARTICULARS</th>
                    <th>LENGTH</th>
                    <th>AMOUNT</th>
                </tr>
            </thead>
            <br>
            <tbody>';
            $total = 0.0;
            foreach (array_unique($_POST['channel']) as $val) {
                $total += TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
                $c = 0;
                echo '<tr>
                <td class="text-start"><b>' . TvcMgmtChannelCluster::model()->get_name($val) . '</b></td>
                <td>' . $_POST['TvcOrder']['length'] . '</td>
                <td>' . TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']) . '</td></tr>';

                ++$c;
            }
            echo '</tbody>
            <tfoot>
									<tr>
										<td class="text-end"><b>SUB-TOTAL</b></td>
										<td></td>
										<td style="font-size:18px;color:green"><b>' . number_format($total, 2) . '</b></td>
									</tr>
                                    <tr>
                                    <td></td>
                                    <td></td>
                                        <td ><span style="color:red;text-align:right">*NOTE: Subject to 12% VAT</span></td>
                                    </tr>
								</tfoot>
             </table>';
        }

        if ($servicetype == 2) {
            echo "<h3>NON-TRANSMISSION</h3>";
            echo '<table class="table align-items-center" style="font-size:10px;padding:1px;border-spacing: 5px;">
            <thead class="thead-light">
                <tr style="background-color: ##8898aa;">
                    <th>PARTICULARS</th>
                    <th>QTY</th>
					<th>UNIT PRICE</th>
					<th>AMOUNT</th>
                </tr>
            </thead>
            <br>
            <tbody>';
            $n = 0;
            $total = 0.0;
            foreach ($_POST['non_tran']['id'] as $val) {
                $total += (TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n]);
                echo '<tr>
                <td class="text-start"><b>' . TvcMgmtExtraServicesSub::model()->get_name($_POST['non_tran']['id'][$n]) . '</b></td>
                <td>' . $_POST['non_tran']['qty'][$n] . '</td>
                <td>' . number_format(TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]), 2) . '</td>
                <td>' . number_format(TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n], 2) . '</td></tr>';
                ++$n;
            }
            echo '</tbody>
            <tfoot>
            <tr>
            <td></td>
                <td class="text-end"><b>SUB-TOTAL</b></td>
                <td></td>
                <td style="font-size:18px;color:green"><b>' . number_format($total, 2) . '</b></td>
            </tr>
            <tr>
            <td></td>
            <td></td>
            <td></td>
                <td ><span style="color:red;text-align:right">*NOTE: Subject to 12% VAT</span></td>
            </tr>
        </tfoot>
             </table>';
        }

        // echo json_encode($result);

    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new TvcOrder();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TvcOrder'])) {
            $uniqid = uniqid();

            $model->attributes = $_POST['TvcOrder'];
            $model->order_code = 'O' . date("Ymd") . TvcOrder::model()->count();
            $model->break_date = $_POST['TvcOrder']['break_date'] == '' ? null : $_POST['TvcOrder']['break_date'];
            $model->share_date = $_POST['TvcOrder']['share_date'] == '' ? null : $_POST['TvcOrder']['share_date'];
            $model->asc_date = $_POST['TvcOrder']['asc_date'] == '' ? null : $_POST['TvcOrder']['asc_date'];
            $model->asc_valid_from = $_POST['TvcOrder']['asc_valid_from'] == '' ? null : $_POST['TvcOrder']['asc_valid_from'];
            $model->asc_valid_to = $_POST['TvcOrder']['asc_valid_to'] == '' ? null : $_POST['TvcOrder']['asc_valid_to'];
            $model->order_id = $uniqid;
            $model->type = 1;
            $model->created_by = 1;
            $model->created_at = date('Y-m-d');
            $model->save();



            if ($_POST['share_link'] != '') {
                $s = 0;
                foreach ($_POST['share_link'] as $val) {
                    $sharelink = new TvcOrderShareLink();
                    $sharelink->order_id = $uniqid;
                    $sharelink->share_link = $_POST['share_link'][$s];
                    $sharelink->save();
                    ++$s;
                }
            }

            $grandtotal = 0.0;
            if ($_POST['TvcOrder']['service_type'] == 1) {
                $c = 0;
                $total = 0.0;
                foreach ($_POST['channel'] as $val) {
                    $total += TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
                    $channelorder = new TvcOrderChannel();
                    $channelorder->order_id = $uniqid;
                    $channelorder->channel_id = $_POST['channel'][$c];
                    $channelorder->cluster_id = TvcMgmtChannel::model()->get_cluster_id($_POST['channel'][$c]);
                    $channelorder->price = TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
                    $channelorder->save();
                    ++$c;
                }

                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
            }
            if ($_POST['TvcOrder']['service_type'] == 2) {
                $n = 0;
                $total = 0.0;
                foreach ($_POST['non_tran']['id'] as $val) {
                    $channelnontran = new TvcOrderServices();
                    $total += TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran->order_id = $uniqid;
                    $channelnontran->sub_cat_id = $_POST['non_tran']['id'][$n];
                    $channelnontran->qty = $_POST['non_tran']['qty'][$n];
                    $channelnontran->price = TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran->cat_id = TvcMgmtExtraServicesSub::model()->get_cat_id($_POST['non_tran']['id'][$n]);
                    $channelnontran->save();
                    ++$n;
                }

                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 1;
                        $attachment->save();

                        echo 'success';
                    } else {
                        echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 2;
                        $attachment->save();

                        echo 'success';
                    } else {
                        echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 3;
                        $attachment->save();

                        echo 'success';
                    } else {
                        echo 'error asdasd';
                    }

                    ++$po;
                }
            }

            // print_r($_FILES);
            // print_r($_POST);

            // print_r($_POST);
            // $model->attributes=$_POST['TvcOrder'];
            // if($model->save())
            // 	$this->redirect(array('view','id'=>$model->id));

            $this->emailorder($model->order_code);

            $this->redirect(['view', 'id' => $model->id]);
        }

        $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionSave()
    {
        $model = new TvcOrder();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        // echo 'asdasd';
        if (isset($_POST['TvcOrder'])) {
            $uniqid = uniqid();

            $model->attributes = $_POST['TvcOrder'];
            $model->order_code = 'ORDER-' . strtoupper(uniqid());
            $model->break_date = $_POST['TvcOrder']['break_date'] == '' ? null : $_POST['TvcOrder']['break_date'];
            $model->share_date = $_POST['TvcOrder']['share_date'] == '' ? null : $_POST['TvcOrder']['share_date'];
            $model->asc_date = $_POST['TvcOrder']['asc_date'] == '' ? null : $_POST['TvcOrder']['asc_date'];
            $model->asc_valid_from = $_POST['TvcOrder']['asc_valid_from'] == '' ? null : $_POST['TvcOrder']['asc_valid_from'];
            $model->asc_valid_to = $_POST['TvcOrder']['asc_valid_to'] == '' ? null : $_POST['TvcOrder']['asc_valid_to'];
            $model->order_id = $uniqid;
            $model->type = 3;
            $model->created_by = 1;
            $model->created_at = date('Y-m-d');
            $model->save();

            if ($_POST['share_link'] != '') {
                $s = 0;
                foreach ($_POST['share_link'] as $val) {
                    $sharelink = new TvcOrderShareLink();
                    $sharelink->order_id = $uniqid;
                    $sharelink->share_link = $_POST['share_link'][$s];
                    $sharelink->save();
                    ++$s;
                }
            }

            $grandtotal = 0.0;
            if ($_POST['TvcOrder']['service_type'] == 1) {
                $c = 0;
                $total = 0.0;
                foreach ($_POST['channel'] as $val) {
                    $total += TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);

                    $channelorder = new TvcOrderChannel();
                    $channelorder->order_id = $uniqid;
                    $channelorder->channel_id = $_POST['channel'][$c];
                    $channelorder->cluster_id = TvcMgmtChannel::model()->get_cluster_id($_POST['channel'][$c]);
                    $channelorder->price = TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
                    $channelorder->save();
                    ++$c;
                }
                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
            }
            if ($_POST['TvcOrder']['service_type'] == 2) {
                $n = 0;
                $total = 0.0;
                foreach ($_POST['non_tran']['id'] as $val) {
                    $total += TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran = new TvcOrderServices();
                    $channelnontran->order_id = $uniqid;
                    $channelnontran->sub_cat_id = $_POST['non_tran']['id'][$n];
                    $channelnontran->qty = $_POST['non_tran']['qty'][$n];
                    $channelnontran->price = TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran->cat_id = TvcMgmtExtraServicesSub::model()->get_cat_id($_POST['non_tran']['id'][$n]);
                    $channelnontran->save();
                    ++$n;
                }
                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 1;
                        $attachment->save();

                        // echo 'success';
                    } else {
                        // echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 2;
                        $attachment->save();

                        // echo 'success';
                    } else {
                        // echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 3;
                        $attachment->save();

                        // echo 'success';
                    } else {
                        // echo 'error asdasd';
                    }

                    ++$po;
                }
            }

            if (isset($_POST['materialid'])) {
                $m = 0;
                foreach ($_POST['materialid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['materialid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['materialid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['materialid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['materialid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['materialid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            if (isset($_POST['poid'])) {
                $m = 0;
                foreach ($_POST['poid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['poid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['poid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['poid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['poid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['poid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            if (isset($_POST['ascclid'])) {
                $m = 0;
                foreach ($_POST['ascclid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['ascclid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['ascclid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['ascclid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['ascclid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['ascclid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            // print_r($_FILES);
            // print_r($_POST);

            // print_r($_POST);
            // $model->attributes=$_POST['TvcOrder'];
            // if($model->save())
            // 	$this->redirect(array('view','id'=>$model->id));
            // echo 'asdasd'.json_encode($model->getErrors());

            echo $model->id;
            // $this->redirect(['view', 'id' => $model->id]);
        }

        // $this->render('create', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        Yii::app()->db
            ->createCommand('UPDATE tvc_order SET type = 4 WHERE order_id=:order_id')
            ->bindValues([':order_id' => $_POST['TvcOrder']['order_id']])
            ->execute();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $models = new TvcOrder();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TvcOrder'])) {
            $uniqid = uniqid();

            $models->attributes = $_POST['TvcOrder'];

            $models->break_date = $_POST['TvcOrder']['break_date'] == '' ? null : $_POST['TvcOrder']['break_date'];
            $models->share_date = $_POST['TvcOrder']['share_date'] == '' ? null : $_POST['TvcOrder']['share_date'];
            $models->asc_date = $_POST['TvcOrder']['asc_date'] == '' ? null : $_POST['TvcOrder']['asc_date'];
            $models->asc_valid_from = $_POST['TvcOrder']['asc_valid_from'] == '' ? null : $_POST['TvcOrder']['asc_valid_from'];
            $models->asc_valid_to = $_POST['TvcOrder']['asc_valid_to'] == '' ? null : $_POST['TvcOrder']['asc_valid_to'];
            $models->order_id = $uniqid;
            $models->type = 1;
            $models->created_by = 1;
            $models->created_at = date('Y-m-d');
            $models->save();

            if ($_POST['share_link'] != '') {
                $s = 0;
                foreach ($_POST['share_link'] as $val) {
                    $sharelink = new TvcOrderShareLink();
                    $sharelink->order_id = $uniqid;
                    $sharelink->share_link = $_POST['share_link'][$s];
                    $sharelink->save();
                    ++$s;
                }
            }

            $grandtotal = 0.0;
            if ($_POST['TvcOrder']['service_type'] == 1) {
                $c = 0;
                $total = 0.0;
                foreach ($_POST['channel'] as $val) {
                    $total += TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
                    $channelorder = new TvcOrderChannel();
                    $channelorder->order_id = $uniqid;
                    $channelorder->channel_id = $_POST['channel'][$c];
                    $channelorder->cluster_id = TvcMgmtChannel::model()->get_cluster_id($_POST['channel'][$c]);
                    $channelorder->price = TvcMgmtRate::model()->get_rate($_POST['TvcOrder']['advertiser'], $_POST['TvcOrder']['agency_company'], $_POST['TvcOrder']['length']);
                    $channelorder->save();
                    ++$c;
                }
                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
            }
            if ($_POST['TvcOrder']['service_type'] == 2) {
                $n = 0;
                $total = 0.0;
                foreach ($_POST['non_tran']['id'] as $val) {
                    $total += TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran = new TvcOrderServices();
                    $channelnontran->order_id = $uniqid;
                    $channelnontran->sub_cat_id = $_POST['non_tran']['id'][$n];
                    $channelnontran->qty = $_POST['non_tran']['qty'][$n];
                    $channelnontran->price = TvcMgmtExtraServicesSub::model()->get_price($_POST['non_tran']['id'][$n]) * $_POST['non_tran']['qty'][$n];
                    $channelnontran->cat_id = TvcMgmtExtraServicesSub::model()->get_cat_id($_POST['non_tran']['id'][$n]);
                    $channelnontran->save();
                    ++$n;
                }
                $ordercharge = new TvcOrderCharges();
                $ordercharge->order_id = $uniqid;
                $ordercharge->grand_total = $total;
                $ordercharge->save();
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 1;
                        $attachment->save();

                        echo 'success';
                    } else {
                        echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 2;
                        $attachment->save();

                        echo 'success';
                    } else {
                        echo 'error asdasd';
                    }

                    ++$po;
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
                        $attachment = new TvcOrderAttachment();
                        $attachment->order_id = $uniqid;
                        $attachment->filename = $fileName;
                        $attachment->path = $targetFilePath;
                        $attachment->filesize = $size;
                        $attachment->format = $fileType;
                        $attachment->type = 3;
                        $attachment->save();

                        echo 'success';
                    } else {
                        echo 'error asdasd';
                    }

                    ++$po;
                }
            }

            if (isset($_POST['materialid'])) {
                $m = 0;
                foreach ($_POST['materialid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['materialid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['materialid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['materialid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['materialid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['materialid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            if (isset($_POST['poid'])) {
                $m = 0;
                foreach ($_POST['poid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['poid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['poid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['poid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['poid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['poid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }

            if (isset($_POST['ascclid'])) {
                $m = 0;
                foreach ($_POST['ascclid'] as $val) {
                    $attachments = new TvcOrderAttachment();

                    $attachments->order_id = $uniqid;
                    $attachments->filename = TvcOrderAttachment::model()->get_filename($_POST['ascclid'][$m]);
                    $attachments->path = TvcOrderAttachment::model()->get_path($_POST['ascclid'][$m]);
                    $attachments->filesize = TvcOrderAttachment::model()->get_filesize($_POST['ascclid'][$m]);
                    $attachments->format = TvcOrderAttachment::model()->get_format($_POST['ascclid'][$m]);
                    $attachments->type = TvcOrderAttachment::model()->get_type($_POST['ascclid'][$m]);
                    $attachments->save();
                    ++$m;
                }
            }
            // print_r($_FILES);
            // print_r($_POST);

            // print_r($_POST);
            // $model->attributes=$_POST['TvcOrder'];
            // if($model->save())
            // 	$this->redirect(array('view','id'=>$model->id));

            $this->redirect(['view', 'id' => $models->id]);
        }

        $this->render('update', [
            'model' => $model,
            'models' => $models,
        ]);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     *
     * @param int $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : ['admin']);
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('TvcOrder');
        $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new TvcOrder('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TvcOrder'])) {
            $model->attributes = $_GET['TvcOrder'];
        }

        $this->render('admin', [
            'model' => $model,
        ]);
    }

    public function actionAdmin_save()
    {
        $model = new TvcOrder('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TvcOrder'])) {
            $model->attributes = $_GET['TvcOrder'];
        }

        $this->render('admin_save', [
            'model' => $model,
        ]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     *
     * @param int $id the ID of the model to be loaded
     *
     * @return TvcOrder the loaded model
     *
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = TvcOrder::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    /**
     * Performs the AJAX validation.
     *
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
