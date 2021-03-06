<?php

/**
 * This is the model class for table "tvc_order_attachment".
 *
 * The followings are the available columns in table 'tvc_order_attachment':
 *
 * @property int    $id
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
     * @return array validation rules for model attributes
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['order_id, type, filename, path, filesize, format', 'length', 'max' => 255],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, order_id, type, filename, path, filesize, format', 'safe', 'on' => 'search'],
        ];
    }

    /**
     * @return array relational rules
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order',
            'filename' => 'Filename',
            'path' => 'Path',
            'filesize' => 'Filesize',
            'format' => 'Format',
        ];
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
     *                             based on the search/filter conditions
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria();

        $criteria->compare('id', $this->id);
        $criteria->compare('order_id', $this->order_id, true);
        $criteria->compare('filename', $this->filename, true);
        $criteria->compare('path', $this->path, true);
        $criteria->compare('filesize', $this->filesize, true);
        $criteria->compare('format', $this->format, true);

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
        ]);
    }

    public function get_po($id)
    {
        $criteria = new CDbCriteria();

        $criteria->addCondition('order_id = "'.$id.'" and type = 1');

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'pagination' => false,
        ]);
    }

    public function get_materials($id)
    {
        $criteria = new CDbCriteria();

        $criteria->addCondition('order_id = "'.$id.'" and type = 2');

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'pagination' => false,
        ]);
    }

    public function get_attachment($id)
    {
        $criteria = new CDbCriteria();

        $criteria->addCondition('order_id = "'.$id.'" and type = 3');

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'pagination' => false,
        ]);
    }

    public function get_filename($id)
    {
        $sql = $this::model()->findByAttributes(['id' => $id]);

        return $sql->filename;
    }

    public function get_path($id)
    {
        $sql = $this::model()->findByAttributes(['id' => $id]);

        return $sql->path;
    }

    public function get_filesize($id)
    {
        $sql = $this::model()->findByAttributes(['id' => $id]);

        return $sql->filesize;
    }

    public function get_type($id)
    {
        $sql = $this::model()->findByAttributes(['id' => $id]);

        return $sql->type;
    }

    public function get_format($id)
    {
        $sql = $this::model()->findByAttributes(['id' => $id]);

        return $sql->format;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     *
     * @param string $className active record class name
     *
     * @return TvcOrderAttachment the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
