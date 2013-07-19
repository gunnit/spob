<?php

/**
 * This is the model class for table "{{bridge_contract}}".
 *
 * The followings are the available columns in table '{{bridge_contract}}':
 * @property integer $id_bridge_contract
 * @property integer $user_id
 * @property integer $id_employer_contract
 * @property integer $approved
 * @property integer $confirmed
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property EmployerContract $idEmployerContract
 */
class BridgeContract extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BridgeContract the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{bridge_contract}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, id_employer_contract, id_employer, approved, confirmed', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_bridge_contract, id_employer, user_id, id_employer_contract, approved, confirmed', 'safe', 'on' => 'search'),
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
            'idEmployerContract' => array(self::BELONGS_TO, 'EmployerContract', 'id_employer_contract'),
            'sumOfCosts' => array(self::STAT, 'BridgeContract', 'id_employer_contract', 'select'=>'SUM(costs)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_bridge_contract' => __('Id Bridge Contract'),
            'user_id' => __('User'),
            'id_employer_contract' => __('Id Employer Contract'),
            'approved' => __('Approved'),
            'confirmed' => __('Job Completed'),
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

        $criteria->compare('id_bridge_contract', $this->id_bridge_contract);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('id_employer_contract', $this->id_employer_contract);
        $criteria->compare('approved', $this->approved);
        $criteria->compare('confirmed', $this->confirmed);



        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function searchEmployee() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_bridge_contract', $this->id_bridge_contract);
        $criteria->compare('user_id', Yii::app()->user->id);
        $criteria->compare('id_employer_contract', $this->id_employer_contract);
        $criteria->compare('approved', $this->approved);
        $criteria->compare('confirmed', $this->confirmed);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}