<?php

/**
 * This is the model class for table "tvc_traffic_log".
 *
 * The followings are the available columns in table 'tvc_traffic_log':
 * @property integer $id
 * @property string $order_code
 * @property integer $order_form_status
 * @property string $order_form_datetime
 * @property integer $order_form_user
 * @property integer $meterial_status
 * @property string $material_datetime
 * @property integer $material_user
 * @property integer $asc_clearance_status
 * @property string $asc_clearance_datetime
 * @property integer $asc_clearance_user
 * @property integer $billing_status
 * @property string $billing_datetime
 * @property integer $Billing_user
 * @property integer $order_status
 * @property string $order_status_datetime
 * @property integer $order_user
 */
class TvcTrafficLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tvc_traffic_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_form_status, order_form_user, meterial_status, material_user, asc_clearance_status, asc_clearance_user, billing_status, Billing_user, order_status, order_user', 'numerical', 'integerOnly'=>true),
			array('order_code', 'length', 'max'=>255),
			array('order_form_datetime, material_datetime, asc_clearance_datetime, billing_datetime, order_status_datetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_code, order_form_status, order_form_datetime, order_form_user, meterial_status, material_datetime, material_user, asc_clearance_status, asc_clearance_datetime, asc_clearance_user, billing_status, billing_datetime, Billing_user, order_status, order_status_datetime, order_user', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_code' => 'Order Code',
			'order_form_status' => 'Order Form Status',
			'order_form_datetime' => 'Order Form Datetime',
			'order_form_user' => 'Order Form User',
			'meterial_status' => 'Meterial Status',
			'material_datetime' => 'Material Datetime',
			'material_user' => 'Material User',
			'asc_clearance_status' => 'Asc Clearance Status',
			'asc_clearance_datetime' => 'Asc Clearance Datetime',
			'asc_clearance_user' => 'Asc Clearance User',
			'billing_status' => 'Billing Status',
			'billing_datetime' => 'Billing Datetime',
			'Billing_user' => 'Billing User',
			'order_status' => 'Order Status',
			'order_status_datetime' => 'Order Status Datetime',
			'order_user' => 'Order User',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('order_code',$this->order_code,true);
		$criteria->compare('order_form_status',$this->order_form_status);
		$criteria->compare('order_form_datetime',$this->order_form_datetime,true);
		$criteria->compare('order_form_user',$this->order_form_user);
		$criteria->compare('meterial_status',$this->meterial_status);
		$criteria->compare('material_datetime',$this->material_datetime,true);
		$criteria->compare('material_user',$this->material_user);
		$criteria->compare('asc_clearance_status',$this->asc_clearance_status);
		$criteria->compare('asc_clearance_datetime',$this->asc_clearance_datetime,true);
		$criteria->compare('asc_clearance_user',$this->asc_clearance_user);
		$criteria->compare('billing_status',$this->billing_status);
		$criteria->compare('billing_datetime',$this->billing_datetime,true);
		$criteria->compare('Billing_user',$this->Billing_user);
		$criteria->compare('order_status',$this->order_status);
		$criteria->compare('order_status_datetime',$this->order_status_datetime,true);
		$criteria->compare('order_user',$this->order_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TvcTrafficLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
