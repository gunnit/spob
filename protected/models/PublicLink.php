<?php

/**
 * This is the model class for table "{{public_link}}".
 *
 * The followings are the available columns in table '{{public_link}}':
 * @property integer $id_public_link
 * @property integer $id_user
 * @property string $link
 * @property string $creation_date
 * @property string $category
  * @property string $web_page
 * * The followings are the available model relations:
 * @property Users $idUser
 */
class PublicLink extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PublicLink the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{public_link}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category, link', 'required'),
            array('id_user', 'numerical', 'integerOnly' => true),
            array('link', 'length', 'max' => 999),
            array('link', 'url',
                'allowEmpty' => false,
                'defaultScheme' => null,
                //'pattern' => 'esspressione regolare',
                'message' => 'You are not using a correct sytax fo your link.',
                'validSchemes' => (array('http', 'https')),
                'on'=>'movie'
            ),
            array('category, web_page', 'length', 'max' => 255),
            array('creation_date', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false,
                'on' => 'insert'),
            array('id_public_link, category, id_user, link, creation_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_public_link' => 'Id Public Link',
            'id_user' => 'Creation User',
            'link' => __('Link'),
            'creation_date' => __('Creation Date'),
            'category' => __('Category'),
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

        $criteria->compare('id_public_link', $this->id_public_link);
        $criteria->compare('id_user', $this->id_user);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('creation_date', $this->creation_date, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}