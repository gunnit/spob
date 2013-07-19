<?php

/**
 * This is the model class for table "{{lookup}}".
 *
 * The followings are the available columns in table '{{lookup}}':
 * @property integer $id_lookup
 * @property string $name
 * @property integer $code
 * @property string $type
 */
class Lookup extends CActiveRecord
{
     private static $_items=array();
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lookup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{lookup}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code', 'numerical', 'integerOnly'=>true),
			array('name, type', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_lookup, name, code, type', 'safe', 'on'=>'search'),
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
			'id_lookup' => 'Id Lookup',
			'name' => 'Name',
			'code' => 'Code',
			'type' => 'Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_lookup',$this->id_lookup);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         public static function items($type)
        {
            if(!isset(self::$_items[$type]))
                self::loadItems($type);
            return self::$_items[$type];
        }
        
               
        public static function item($type, $code)
        {
            if(!isset(self::$_items[$type]))
                self::loadItems($type);
            return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : false;           
        }
        
        private static function loadItems($type)
        {
            self::$_items[$type]=array();
            $models=self::model()->findAll(array(
                'condition'=>'type=:type',
                'params'=>array(':type'=>$type),
                //'order'=>'position',
            ));
            foreach($models as $model)
                self::$_items[$type][$model->code]=$model->name;
        }
        
         public function byMaxCode($typeSelect)
        {          
            $this->getDbCriteria()->mergeWith(array(
                        'condition' => "type='$typeSelect'",
                        'limit'=>'1',
                        'order'=>'code DESC',
                        ));
            return $this;
        }
}