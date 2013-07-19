<?php

/**
 * This is the model class for table "{{employer_contract}}".
 *
 * The followings are the available columns in table '{{employer_contract}}':
 * @property integer $id_employer_contract
 * @property string $title
 * @property string $description
 * @property double $cost
 * @property string $cost_description
 * @property integer $tipology
 * @property string $creation_date
 * @property string $start_date
 * @property string $end_date
 * @property integer $user_id
 * @property integer $id_location
 * @property integer $public
 * @property string $update_date
 * @property integer $indoors
 * @property integer $customer_facing
 * @property integer $day_period
 * @property string $country
 * @property string $city
 * @property string $state
 * @property string $other_tipology 
 * @property string $street
 * @property string $contact
 * @property string $cap
 * @property string $status
 */
class EmployerContract extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EmployerContract the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{employer_contract}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, cost, city, street', 'required'),
            array('tipology, user_id, id_location, public, indoors, customer_facing, day_period, status', 'numerical', 'integerOnly' => true),
            array('cost', 'numerical'),
            array('title, cost_description', 'length', 'max' => 255),
            array('description, creation_date, start_date, end_date, update_date', 'safe'),
            array('country, city, state, other_tipology, street, contact, cap', 'length', 'max' => 45),
            array('update_date', 'default',
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
            array('id_employer_contract, title, description, cost, cost_description, tipology, creation_date, start_date, end_date, user_id, id_location, public, update_date, indoors, customer_facing, day_period, country, city, state, other_tipology, street, contact, cap, status', 'safe', 'on' => 'search'),
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
            'bridgeContract' => array(self::HAS_MANY, 'BridgeContract', 'id_bridge_contract'),
            //'sumOfCosts' => array(self::STAT, 'BridgeContract', 'id_employer_contract', 'select'=>'SUM(costs)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_employer_contract' => __('Id Employer Contract'),
            'title' => __('Job Title'),
            'description' => __('Description'),
            'cost' => __('Compensation'),
            'cost_description' => __('Cost Description'),
            'tipology' => __('Tipology'),
            'creation_date' => __('Creation Date'),
            'start_date' => __('Start Date'),
            'end_date' => __('End Date'),
            'user_id' => __('User'),
            'id_location' => __('Location'),
            'public' => __('Public'),
            'update_date' => __('Update Date'),
            'indoors' => __('Sceen'),
            'customer_facing' => __('Customer Facing'),
            'day_period' => __('Day Period'),
            'country' => __('Country'),
            'city' => __('City'),
            'state' => __('State'),
            'street' => __('Street'),
            'contact' => __('Contact'),
            'cap' => __('Cap'),
            'status' => __('Approved'),
            'other_tipology'=>__('Other Tipology')
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
        $doSearch = false;
        $condition = '';

        $criteria->compare('id_employer_contract', $this->id_employer_contract);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('cost', $this->cost);
        $criteria->compare('cost_description', $this->cost_description, true);
        $criteria->compare('tipology', $this->tipology);
        $criteria->compare('creation_date', $this->creation_date, true);

        if (isset($this->start_date) && !empty($this->start_date)) {
            list($sfd, $std) = explode(' - ', $this->start_date);
            $condition.="start_date BETWEEN str_to_date('" . $sfd . "','%m/%d/%Y') AND str_to_date('" . $std . "','%m/%d/%Y') AND ";
        }
        if (isset($this->end_date) && !empty($this->end_date)) {
            list($efd, $etd) = explode(' - ', $this->end_date);
            $condition.="end_date BETWEEN str_to_date('" . $efd . "','%m/%d/%Y') AND str_to_date('" . $etd . "','%m/%d/%Y') AND ";
        }

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('id_location', $this->id_location);
        $criteria->compare('public', $this->public);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('indoors', $this->indoors);
        $criteria->compare('customer_facing', $this->customer_facing);
        $criteria->compare('day_period', $this->day_period);


        $criteria->compare('country', $this->country, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('other_tipology', $this->other_tipology, true);
        
        $criteria->compare('street', $this->street, true);
        $criteria->compare('contact', $this->contact, true);
        $criteria->compare('cap', $this->cap, true);

        if (!empty($condition))
            $criteria->condition.=" AND " . substr($condition, 0, -5);

        if (isset($_GET['EmployerContract'])) {
            foreach ($_GET['EmployerContract'] as $value) {
                if (!empty($value)) {
                    $doSearch = true;
                }
            }
        }

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pagesize' => 10,),
                ));
    }

    public function searchAlljobs() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('cost', $this->cost);
        $criteria->compare('cost_description', $this->cost_description, true);
        $criteria->compare('tipology', $this->tipology);
        $criteria->compare('creation_date', $this->creation_date, true);
        $criteria->compare('user_id', Yii::app()->user->id);
        $criteria->compare('id_location', $this->id_location);
        $criteria->compare('public', $this->public);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('indoors', $this->indoors);
        $criteria->compare('customer_facing', $this->customer_facing);
        $criteria->compare('day_period', $this->day_period);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('other_tipology', $this->other_tipology, true);
        $criteria->compare('street', $this->street, true);
        $criteria->compare('contact', $this->contact, true);
        $criteria->compare('cap', $this->cap, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
//                  $tmp='|';
//                if(is_array($this->group)){
//                    foreach($this->group as $id)
//                        $tmp.=$id.'|';
//                    $this->search_group=$tmp;
//                }
            $this->start_date = !empty($this->start_date) ? date('Y-m-d H:i:s', strtotime($this->start_date)) : null;
            $this->end_date = !empty($this->end_date) ? date('Y-m-d H:i:s', strtotime($this->end_date)) : null;
            return true;
        } else {
            return false;
        }
    }

}