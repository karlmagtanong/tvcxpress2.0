<?php

/**
 * This is the model class for table "tvc_mgmt_channel".
 *
 * The followings are the available columns in table 'tvc_mgmt_channel':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $cluster
 */
class TvcMgmtChannel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tvc_mgmt_channel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, cluster', 'numerical', 'integerOnly' => true),
			array('name,order_id', 'length', 'max' => 255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name,  type, cluster', 'safe', 'on' => 'search'),
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
			'clusters' => array(self::BELONGS_TO, 'TvcMgmtChannelCluster', '', 'foreignKey' => array('cluster' => 'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'type' => 'Type',
			'cluster' => 'Cluster',
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
		$criteria->with = array('clusters');

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('type', $this->type);
		$criteria->compare('cluster', $this->cluster);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => false

		));
	}

	public function get_channels($id)
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('cluster = ' . $id . '');

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => false

		));
	}

	public function get_cluster_id($id)
    {
        $sql = $this::model()->findByAttributes(['id' => $id]);

        return $sql->cluster;
    }

	public function get_name($id)
    {
        $sql = $this::model()->findByAttributes(['id' => $id]);

        return $sql->name;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TvcMgmtChannel the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
