<?php

/**
 * This is the model class for table "tvc_traffic".
 *
 * The followings are the available columns in table 'tvc_traffic':
 * @property integer $id
 * @property string $order_code
 * @property string $sched
 * @property integer $order_form
 * @property integer $material
 * @property integer $asc_clearance
 * @property integer $billing
 * @property integer $status
 * @property integer $created_by
 * @property string $created_at
 */
class TvcTraffic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tvc_traffic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_form, material, asc_clearance, billing, status, created_by', 'numerical', 'integerOnly' => true),
			array('order_code', 'length', 'max' => 255),
			array('sched, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_code, sched, order_form, material, asc_clearance, billing, status, created_by, created_at', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_code' => 'Order Code',
			'sched' => 'Sched',
			'order_form' => 'Order Form',
			'material' => 'Material',
			'asc_clearance' => 'Asc Clearance',
			'billing' => 'Billing',
			'status' => 'Status',
			'created_by' => 'Created By',
			'created_at' => 'Created At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('order_code', $this->order_code, true);
		$criteria->compare('sched', $this->sched, true);
		$criteria->compare('order_form', $this->order_form);
		$criteria->compare('material', $this->material);
		$criteria->compare('asc_clearance', $this->asc_clearance);
		$criteria->compare('billing', $this->billing);
		$criteria->compare('status', $this->status);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('created_at', $this->created_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	public function get_traffic($data)
	{

		if ($data['trastat'] == 1) {
			$where .= " and b.sched IS null";
		}
		if ($data['trastat'] == 2) {
			$where .= " and b.sched = '" . date("Y-m-d") . "'";
		}
		if ($data['trastat'] == 2) {
			$where .= " and b.sched IS not null";
		}
		if ($data['trastat'] == 3) {
			$where .= " and b.status = 3";
		}

		if ($data['orderno'] != "") {
			$where .= " and a.order_code like '%" . $data['orderno'] . "%'";
		}
		if ($data['advertiser'] != "") {
			$where .= " and a.advertiser like '%" . $data['advertiser'] . "%'";
		}
		if ($data['agency'] != "") {
			$where .= " and a.agency_company like '%" . $data['agency'] . "%'";
		}
		if ($data['title'] != "") {
			$where .= " and a.asc_project_title like '%" . $data['title'] . "%'";
		}
		if ($data['service'] != "") {
			$where .= " and a.service_type = '" . $data['service'] . "'";
		}
		if ($data['sched'] != "") {
			$where .= " and b.sched = '" . $data['sched'] . "'";
		}
		if ($data['orderfrom'] != "" || $data['orderto'] != "") {
			$where .= " and a.created_at >= '" . $data['orderfrom'] . "' and a.created_at <= '" . $data['orderto'] . "'";
		}




		$sql = '
		SELECT a.id as orderid, a.*,b.order_form as ordrstat, b.material as matstat, b.asc_clearance as ascstat, b.billing as billignstat, status as trafficstat,
		b.sched as sched 
		FROM tvc_order a 
		LEFT JOIN tvc_traffic b ON b.order_code = a.order_code AND a.type = 1
		LEFT JOIN tvc_traffic_log c ON c.order_code = a.order_code AND a.type = 1
		WHERE a.type = 1
		' . $where . '
		';

		$count = Yii::app()->db->createCommand($sql)->queryScalar();
		// echo $sql;
		return $dataProvider = new CSqlDataProvider($sql, array(
			'totalItemCount' => $count,
			'keyField' => 'order_id',
			'pagination' => false
		));
	}

	public function get_status($id, $stat)
	{

		if ($stat == 1) { // ORDER FORM
			if ($id == 1) {
				return '<span class="badge bg-warning">For Checking</span>';
			}
			if ($id == 2) {
				return '<span class="badge bg-success">Complete</span>';
			}
			if ($id == 3) {
				return '<span class="badge bg-danger">Issue Found</span>';
			}
			if ($id == "") {
				return '<span class="badge bg-danger">Not Set</span>';
			}
		}
		if ($stat == 2) { // MATERIAL
			if ($id == 1) {
				return '<span class="badge bg-warning">Pending</span>';
			}
			if ($id == 2) {
				return '<span class="badge bg-info">Upload Verified</span>';
			}
			if ($id == 3) {
				return '<span class="badge bg-info">For Approval</span>';
			}
			if ($id == 4) {
				return '<span class="badge bg-info">Processing</span>';
			}
			if ($id == 5) {
				return '<span class="badge bg-danger">Issue Found</span>';
			}
			if ($id == 6) {
				return '<span class="badge bg-success">Approved</span>';
			}
			if ($id == "") {
				return '<span class="badge bg-danger">Not Set</span>';
			}
		}
		if ($stat == 3) { // ASC CLEARANCE
			if ($id == 1) {
				return '<span class="badge bg-warning">Pending</span>';
			}
			if ($id == 2) {
				return '<span class="badge bg-success">Attached</span>';
			}
			if ($id == 3) {
				return '<span class="badge bg-danger">Issue Found</span>';
			}
			if ($id == "") {
				return '<span class="badge bg-danger">Not Set</span>';
			}
		}
		if ($stat == 4) { // BILLING
			if ($id == 1) {
				return '<span class="badge bg-warning">Pending</span>';
			}
			if ($id == 2) {
				return '<span class="badge bg-success">Cleared</span>';
			}
			if ($id == "") {
				return '<span class="badge bg-danger">Not Set</span>';
			}
		}
		if ($stat == 5) { // ORDER STATUS
			if ($id == 1) {
				return '<span class="badge bg-warning">Processing</span>';
			}
			if ($id == 2) {
				return '<span class="badge bg-danger">Incomplete</span>';
			}
			if ($id == 3) {
				return '<span class="badge bg-success">Ready to Transmit</span>';
			}
			if ($id == "") {
				return '<span class="badge bg-danger">Not Set</span>';
			}
		}
	}

	public function get_ifexist($id)
	{
		$sql = $this::model()->findByAttributes(['order_code' => $id]);

		return $sql->order_code;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TvcTraffic the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
