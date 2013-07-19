<?php

/**
 * This is the model class for table "{{employer_evaluation}}".
 *
 * The followings are the available columns in table '{{employer_evaluation}}':
 * @property integer $job_id
 * @property integer $employee_id
 * @property integer $contractor_id
 * @property string $comment
 * @property string $creation_date
 * @property integer $soft_skills
 * @property integer $physical_skills
 * @property integer $teamwork
 * @property integer $leadership
 *
 * The followings are the available model relations:
 * @property EmployerContract $job
 */
class EmployerEvaluation extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EmployerEvaluation the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{employer_evaluation}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('job_id, employee_id', 'required'),
            array('
                job_id,
                employee_id,
                contractor_id,
                soft_skills,
                physical_skills,
                teamwork,
                leadership', 'numerical', 'integerOnly' => true),
            array('comment', 'length', 'max' => 255),
            array('creation_date', 'safe'),
            array('creation_date', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false,
                'on' => 'update'),
            array('creation_date', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false,
                'on' => 'insert'),
//            array('contractor_id', 'default',
//                'value' => Yii::app()->user->id,
//                'setOnEmpty' => false,
//                'on' => 'insert'),
//            array('contractor_id', 'default',
//                'value' => Yii::app()->user->id,
//                'setOnEmpty' => false,
//                'on' => 'update'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('
                job_id,
                employee_id,
                contractor_id,
                comment,
                creation_date,
                soft_skills,
                physical_skills,
                teamwork,
                leadership', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'job' => array(self::BELONGS_TO, 'EmployerContract', 'job_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'job_id' => 'Job',
            'employee_id' => 'Employee',
            'contractor_id' => 'Contractor',
            'comment' => 'Comment',
            'creation_date' => 'Creation Date',
            'soft_skills' => 'Soft Skills',
            'physical_skills' => 'Physical Skills',
            'teamwork' => 'Teamwork',
            'leadership' => 'Leadership',
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

        $criteria->compare('job_id', $this->job_id);
        $criteria->compare('employee_id', $this->employee_id);
        $criteria->compare('contractor_id', $this->contractor_id);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('creation_date', $this->creation_date, true);
        $criteria->compare('soft_skills', $this->soft_skills);
        $criteria->compare('physical_skills', $this->physical_skills);
        $criteria->compare('teamwork', $this->teamwork);
        $criteria->compare('leadership', $this->leadership);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}