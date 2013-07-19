<?php

/**
 * This is the model class for table "{{social}}".
 *
 * The followings are the available columns in table '{{social}}':

 * @property integer $user_id
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property string $google
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Social extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Social the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{social}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id', 'numerical', 'integerOnly' => true),
            array('facebook, twitter, linkedin, google', 'length', 'max' => 445),
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
            array('user_id, facebook, twitter, linkedin, google', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => 'User',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'linkedin' => 'Linkedin',
            'google' => 'Google',
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

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('facebook', $this->facebook, true);
        $criteria->compare('twitter', $this->twitter, true);
        $criteria->compare('linkedin', $this->linkedin, true);
        $criteria->compare('google', $this->google, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}