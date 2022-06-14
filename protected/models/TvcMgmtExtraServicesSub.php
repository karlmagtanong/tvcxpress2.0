<?php

/**
 * This is the model class for table "tvc_mgmt_extra_services_sub".
 *
 * The followings are the available columns in table 'tvc_mgmt_extra_services_sub':
 * @property integer $id
 * @property integer $serv_id
 * @property string $sub_category
 * @property double $price
 */
class TvcMgmtExtraServicesSub extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tvc_mgmt_extra_services_sub';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, serv_id', 'numerical', 'integerOnly' => true),
			array('price', 'numerical'),
			array('sub_category', 'length', 'max' => 50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, serv_id, sub_category, price', 'safe', 'on' => 'search'),
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
			'services' => array(self::BELONGS_TO, 'TvcMgmtExtraServices', '', 'foreignKey' => array('serv_id' => 'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'serv_id' => 'Serv',
			'sub_category' => 'Sub Category',
			'price' => 'Price',
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
		$criteria->with = array('services');

		$criteria->compare('id', $this->id);
		$criteria->compare('serv_id', $this->serv_id);
		$criteria->compare('sub_category', $this->sub_category, true);
		$criteria->compare('price', $this->price);
		$criteria->order = 'serv_id ASC';

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => false,
		));
	}

	public function get_subcat($id)
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('serv_id = ' . $id . '');

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => false

		));
	}

	public function get_price($id)
    {
        $sql = $this::model()->findByAttributes(['id' => $id]);

        return $sql->price;
    }

	public function get_cat_id($id)
    {
        $sql = $this::model()->findByAttributes(['id' => $id]);

        return $sql->serv_id;
    }

	public function get_name($id)
	{
		$sql = $this::model()->findByAttributes(['id' => $id]);

		return $sql->sub_category;
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TvcMgmtExtraServicesSub the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
