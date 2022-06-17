<?php

/**
 * This is the model class for table "tvc_mgmt_rate".
 *
 * The followings are the available columns in table 'tvc_mgmt_rate':
 * @property integer $id
 * @property integer $name
 * @property integer $length_from
 * @property integer $length_to
 * @property integer $type
 * @property integer $amount
 */
class TvcMgmtRate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tvc_mgmt_rate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'numerical', 'integerOnly' => true),
			array('name', 'length', 'max' => 255),
			array('amount,length_to,length_from', 'numerical'),


			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, length_from, length_to, type, amount', 'safe', 'on' => 'search'),
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
			'name' => 'Name',
			'length_from' => 'Length From',
			'length_to' => 'Length To',
			'type' => 'Type',
			'amount' => 'Amount',
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
		$criteria->compare('name', $this->name);
		$criteria->compare('length_from', $this->length_from);
		$criteria->compare('length_to', $this->length_to);
		$criteria->compare('type', $this->type);
		$criteria->compare('amount', $this->amount);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => false,
		));
	}

	public function get_type_name($id)
	{

		if ($id == 1) {
			return "Standard Rate";
		}
		if ($id == 2) {
			return "Special Rate (Advertiser)";
		}
		if ($id == 3) {
			return "Special Rate (Agency)";
		}
	}

	public function get_rate($adv, $agen, $len)
	{
// echo $adv;
		if ($this->get_advertiser($adv) != "") {
			$sql = $this->model()->findBySql('SELECT amount from tvc_mgmt_rate where length_from <= "' . $len . '" and length_to >= "' . $len . '" and type = 2 and name = "' . $adv . '"');
			return $sql->amount;
		} else if ($this->get_agency($agen) != "") {
			$sql = $this->model()->findBySql('SELECT amount from tvc_mgmt_rate where length_from <= "' . $len . '" and length_to >= "' . $len . '" and type = 3 and name = "' . $agen . '"');
			return $sql->amount;
		} else {
			$sql = $this->model()->findBySql('SELECT amount from tvc_mgmt_rate where length_from <= "' . $len . '" and length_to >= "' . $len . '" and type = 1');
			return $sql->amount;
		}
	}

	public function get_advertiser($id)
	{
		$sql = $this::model()->findByAttributes(['name' => $id, 'type' => 2]);

		return $sql->name;
	}

	public function get_agency($id)
	{
		$sql = $this::model()->findByAttributes(['name' => $id, 'type' => 3]);

		return $sql->name;
	}

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
