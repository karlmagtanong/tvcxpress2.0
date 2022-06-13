<?php

/**
 * This is the model class for table "tvc_order_attachment".
 *
 * The followings are the available columns in table 'tvc_order_attachment':
 * @property integer $id
 * @property string $order_id
 * @property string $filename
 * @property string $path
 * @property string $filesize
 * @property string $format
 */
class TvcOrderAttachment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tvc_order_attachment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, filename, path, filesize, format', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, filename, path, filesize, format', 'safe', 'on'=>'search'),
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
			'order_id' => 'Order',
			'filename' => 'Filename',
			'path' => 'Path',
			'filesize' => 'Filesize',
			'format' => 'Format',
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
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('filesize',$this->filesize,true);
		$criteria->compare('format',$this->format,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TvcOrderAttachment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
