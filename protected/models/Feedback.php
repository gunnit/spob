<?php

/**
 * This is the model class for table "{{feedback}}".
 *
 * The followings are the available columns in table '{{feedback}}':
 * @property integer $id_feedback
 * @property integer $user_id
 * @property string $creation_date
 * @property string $description
 * @property string $page_link
 * @property integer $status
 */
class Feedback extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Feedback the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{feedback}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, status', 'numerical', 'integerOnly' => true),
            array('description, page_link', 'length', 'max' => 455),
            array('creation_date', 'safe'),
            array('creation_date', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false,
                'on' => 'update'),
            array('creation_date', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false,
                'on' => 'insert'),
            array('user_id', 'default',
                'value' => Yii::app()->user->id,
                'setOnEmpty' => false,
                'on' => 'insert'),
            array('user_id', 'default',
                'value' => Yii::app()->user->id,
                'setOnEmpty' => false,
                'on' => 'update'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_feedback, user_id, creation_date, description, page_link, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
              'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_feedback' => 'Id Feedback',
            'user_id' => 'User',
            'creation_date' => 'Least Modification',
            'description' => 'Description',
            'status' => 'Status',
            'page_link' => 'Page Link',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_feedback', $this->id_feedback);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('creation_date', $this->creation_date, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}