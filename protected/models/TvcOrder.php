<?php

/**
 * This is the model class for table "tvc_order".
 *
 * The followings are the available columns in table 'tvc_order':
 * @property integer $id
 * @property string $order_id
 * @property string $order_code
 * @property string $advertiser
 * @property string $asc_brand
 * @property string $product_category
 * @property string $asc_project_title
 * @property string $length
 * @property string $break_date
 * @property integer $break_time_hh
 * @property integer $break_time_mm
 * @property string $break_time_aa
 * @property string $producer
 * @property string $producer_contact
 * @property string $producer_email
 * @property string $agency_company
 * @property string $agency_contact_person
 * @property string $agency_contact_no
 * @property string $agency_email
 * @property string $billing_ce
 * @property string $billing_company
 * @property string $billing_address
 * @property string $billing_contact_person
 * @property string $billing_contact_no
 * @property string $billing_contact_email
 * @property string $billing_tin
 * @property string $billing_business_type
 * @property integer $payment_terms
 * @property integer $currency
 * @property integer $mode_payment
 * @property string $gcash_name
 * @property string $gcash_email
 * @property string $gcash_number
 * @property integer $service_type
 * @property integer $platform
 * @property integer $delivery_method
 * @property string $delivery_company
 * @property string $delivery_contact_name
 * @property string $delivery_number
 * @property string $delivery_email
 * @property integer $share_type
 * @property integer $share_link
 * @property string $share_date
 * @property integer $share_time_hh
 * @property integer $share_time_mm
 * @property string $share_aa
 * @property integer $asc_upload
 * @property string $asc_date
 * @property integer $asc_time_hh
 * @property integer $asc_time_mm
 * @property string $asc_time_aa
 * @property string $asc_reference_code
 * @property string $asc_valid_from
 * @property string $asc_valid_to
 * @property integer $type
 * @property integer $created_by
 * @property string $created_at
 */
class TvcOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tvc_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, created_by', 'required'),
			array('break_time_mm, payment_terms, currency, mode_payment, service_type, platform, delivery_method, share_type,  share_time_mm, asc_upload,  asc_time_mm, type, created_by', 'numerical', 'integerOnly' => true),
			array('break_time_hh, order_id, order_code, advertiser, asc_brand, product_category, asc_project_title, length, share_link, break_time_aa, share_time_hh,producer, asc_time_hh,producer_contact, producer_email, agency_company, agency_contact_person, agency_contact_no, agency_email, billing_ce, billing_company, billing_address, billing_contact_person, billing_contact_no, billing_contact_email, billing_tin, billing_business_type, gcash_name, gcash_email, gcash_number, delivery_company, delivery_contact_name, delivery_number, delivery_email, share_aa, asc_time_aa, asc_reference_code', 'length', 'max' => 255),
			array('break_date, share_date, asc_date, asc_valid_from, asc_valid_to, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, order_code, advertiser, asc_brand, product_category, asc_project_title, length, break_date, break_time_hh, break_time_mm, break_time_aa, producer, producer_contact, producer_email, agency_company, agency_contact_person, agency_contact_no, agency_email, billing_ce, billing_company, billing_address, billing_contact_person, billing_contact_no, billing_contact_email, billing_tin, billing_business_type, payment_terms, currency, mode_payment, gcash_name, gcash_email, gcash_number, service_type, platform, delivery_method, delivery_company, delivery_contact_name, delivery_number, delivery_email, share_type, share_link, share_date, share_time_hh, share_time_mm, share_aa, asc_upload, asc_date, asc_time_hh, asc_time_mm, asc_time_aa, asc_reference_code, asc_valid_from, asc_valid_to, type, created_by, created_at', 'safe', 'on' => 'search'),
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
			'order_id' => 'Order',
			'order_code' => 'Order Code',
			'advertiser' => 'Advertiser',
			'asc_brand' => 'Asc Brand',
			'product_category' => 'Product Category',
			'asc_project_title' => 'Asc Project Title',
			'length' => 'Length',
			'break_date' => 'Break Date',
			'break_time_hh' => 'Break Time Hh',
			'break_time_mm' => 'Break Time Mm',
			'break_time_aa' => 'Break Time Aa',
			'producer' => 'Producer',
			'producer_contact' => 'Producer Contact',
			'producer_email' => 'Producer Email',
			'agency_company' => 'Agency Company',
			'agency_contact_person' => 'Agency Contact Person',
			'agency_contact_no' => 'Agency Contact No',
			'agency_email' => 'Agency Email',
			'billing_ce' => 'Billing Ce',
			'billing_company' => 'Billing Company',
			'billing_address' => 'Billing Address',
			'billing_contact_person' => 'Billing Contact Person',
			'billing_contact_no' => 'Billing Contact No',
			'billing_contact_email' => 'Billing Contact Email',
			'billing_tin' => 'Billing Tin',
			'billing_business_type' => 'Billing Business Type',
			'payment_terms' => 'Payment Terms',
			'currency' => 'Currency',
			'mode_payment' => 'Mode Payment',
			'gcash_name' => 'Gcash Name',
			'gcash_email' => 'Gcash Email',
			'gcash_number' => 'Gcash Number',
			'service_type' => 'Service Type',
			'platform' => 'Platform',
			'delivery_method' => 'Delivery Method',
			'delivery_company' => 'Delivery Company',
			'delivery_contact_name' => 'Delivery Contact Name',
			'delivery_number' => 'Delivery Number',
			'delivery_email' => 'Delivery Email',
			'share_type' => 'Share Type',
			'share_link' => 'Share Link',
			'share_date' => 'Share Date',
			'share_time_hh' => 'Share Time Hh',
			'share_time_mm' => 'Share Time Mm',
			'share_aa' => 'Share Aa',
			'asc_upload' => 'Asc Upload',
			'asc_date' => 'Asc Date',
			'asc_time_hh' => 'Asc Time Hh',
			'asc_time_mm' => 'Asc Time Mm',
			'asc_time_aa' => 'Asc Time Aa',
			'asc_reference_code' => 'Asc Reference Code',
			'asc_valid_from' => 'Asc Valid From',
			'asc_valid_to' => 'Asc Valid To',
			'type' => 'Type',
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
		$criteria->compare('order_id', $this->order_id, true);
		$criteria->compare('order_code', $this->order_code, true);
		$criteria->compare('advertiser', $this->advertiser, true);
		$criteria->compare('asc_brand', $this->asc_brand, true);
		$criteria->compare('product_category', $this->product_category, true);
		$criteria->compare('asc_project_title', $this->asc_project_title, true);
		$criteria->compare('length', $this->length, true);
		$criteria->compare('break_date', $this->break_date, true);
		$criteria->compare('break_time_hh', $this->break_time_hh);
		$criteria->compare('break_time_mm', $this->break_time_mm);
		$criteria->compare('break_time_aa', $this->break_time_aa, true);
		$criteria->compare('producer', $this->producer, true);
		$criteria->compare('producer_contact', $this->producer_contact, true);
		$criteria->compare('producer_email', $this->producer_email, true);
		$criteria->compare('agency_company', $this->agency_company, true);
		$criteria->compare('agency_contact_person', $this->agency_contact_person, true);
		$criteria->compare('agency_contact_no', $this->agency_contact_no, true);
		$criteria->compare('agency_email', $this->agency_email, true);
		$criteria->compare('billing_ce', $this->billing_ce, true);
		$criteria->compare('billing_company', $this->billing_company, true);
		$criteria->compare('billing_address', $this->billing_address, true);
		$criteria->compare('billing_contact_person', $this->billing_contact_person, true);
		$criteria->compare('billing_contact_no', $this->billing_contact_no, true);
		$criteria->compare('billing_contact_email', $this->billing_contact_email, true);
		$criteria->compare('billing_tin', $this->billing_tin, true);
		$criteria->compare('billing_business_type', $this->billing_business_type, true);
		$criteria->compare('payment_terms', $this->payment_terms);
		$criteria->compare('currency', $this->currency);
		$criteria->compare('mode_payment', $this->mode_payment);
		$criteria->compare('gcash_name', $this->gcash_name, true);
		$criteria->compare('gcash_email', $this->gcash_email, true);
		$criteria->compare('gcash_number', $this->gcash_number, true);
		$criteria->compare('service_type', $this->service_type);
		$criteria->compare('platform', $this->platform);
		$criteria->compare('delivery_method', $this->delivery_method);
		$criteria->compare('delivery_company', $this->delivery_company, true);
		$criteria->compare('delivery_contact_name', $this->delivery_contact_name, true);
		$criteria->compare('delivery_number', $this->delivery_number, true);
		$criteria->compare('delivery_email', $this->delivery_email, true);
		$criteria->compare('share_type', $this->share_type);
		$criteria->compare('share_link', $this->share_link);
		$criteria->compare('share_date', $this->share_date, true);
		$criteria->compare('share_time_hh', $this->share_time_hh);
		$criteria->compare('share_time_mm', $this->share_time_mm);
		$criteria->compare('share_aa', $this->share_aa, true);
		$criteria->compare('asc_upload', $this->asc_upload);
		$criteria->compare('asc_date', $this->asc_date, true);
		$criteria->compare('asc_time_hh', $this->asc_time_hh);
		$criteria->compare('asc_time_mm', $this->asc_time_mm);
		$criteria->compare('asc_time_aa', $this->asc_time_aa, true);
		$criteria->compare('asc_reference_code', $this->asc_reference_code, true);
		$criteria->compare('asc_valid_from', $this->asc_valid_from, true);
		$criteria->compare('asc_valid_to', $this->asc_valid_to, true);
		$criteria->compare('type', $this->type);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('created_at', $this->created_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	public function get_terms_name($id)
	{
		if ($id == 1) {
			return "Same day payment";
		}
		if ($id == 30) {
			return "30 days upon receipt of invoice";
		}
	}

	public function get_currency_name($id)
	{
		if ($id == 1) {
			return "Philippine Peso";
		}
		if ($id == 2) {
			return "US Dollars";
		}
	}

	public function get_payment_name($id)
	{
		if ($id == 1) {
			return "Cash Payment";
		}
		if ($id == 2) {
			return "Check Payment";
		}
		if ($id == 3) {
			return "Bank Deposit/Transfer";
		}
		if ($id == 4) {
			return "Paypal";
		}
		if ($id == 5) {
			return "GCash";
		}
		if ($id == 6) {
			return "PayMaya";
		}
		if ($id == 7) {
			return "Credit / Debit";
		}
	}

	public function get_service_name($id)
	{
		if ($id == 1) {
			return "Transmission";
		}
		if ($id == 2) {
			return "Non-Transmission";
		}
	}

	public function get_platform_name($id)
	{
		if ($id == 1) {
			return "TV";
		}
		if ($id == 2) {
			return "Radio";
		}
		if ($id == 3) {
			return "Online";
		}
		if ($id == 4) {
			return "Print";
		}
	}

	public function get_method_name($id)
	{
		if ($id == 1) {
			return "Physical Delivery";
		}
		if ($id == 2) {
			return "Shared Drive or Download Link";
		}
		if ($id == 3) {
			return "Upload Materials";
		}
	
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TvcOrder the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
