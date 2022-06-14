<?php

/**
 * This is the model class for table "tvc_mgmt_extra_services".
 *
 * The followings are the available columns in table 'tvc_mgmt_extra_services':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $sub_category
 * @property double $price
 * @property integer $type
 */
class TvcMgmtExtraServices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tvc_mgmt_extra_services';
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
			array('price', 'numerical'),
			array('name', 'length', 'max' => 50),
			array('description, sub_category', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, sub_category, price, type', 'safe', 'on' => 'search'),
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
			'description' => 'Description',
			'sub_category' => 'Sub Category',
			'price' => 'Price',
			'type' => 'Type',
		);
	}

	public function get_name($id)
	{
		$sql = $this::model()->findByAttributes(['id' => $id]);

		return $sql->name;
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
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('sub_category', $this->sub_category, true);
		$criteria->compare('price', $this->price);
		$criteria->compare('type', $this->type);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => false

		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TvcMgmtExtraServices the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
