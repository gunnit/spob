<?php

/**
 * This is the model class for table "{{profiles}}".
 *
 * The followings are the available columns in table '{{profiles}}':
 * @property integer $user_id
 * @property string $name
 * @property string $lastname
 * @property string $firstname
 * @property string $last_name
 * @property string $date_of_birth
 * @property integer $gender
 * @property string $cell
 * @property string $skills
 * @property string $experience_description
 * @property integer $country
 * @property string $city
 * @property string $street
 * @property integer $cap
 * @property string $photo
 * @property string $resume
 * @property integer $profile_type
 * @property string $education
 * @property string $about_me
 * @property integer $social_id
 * @property string $cf
 * @property integer $documento
 * The followings are the available model relations:
 * @property Users $user
 */
class Profiles extends CActiveRecord {

    public $imgfiles;
    public $docfiles;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Profiles the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{profiles}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cf', 'required'),
            array('cf', 'unique'),
            array('gender, country, cap, profile_type, social_id', 'numerical', 'integerOnly' => true),
            array('name, last_name, cell, city, street, photo, resume, education, about_me, documento', 'length', 'max' => 255),
            array('cf', 'length', 'max' => 45),
            array('lastname, firstname', 'length', 'max' => 50),
            array('skills, experience_description', 'length', 'max' => 455),
            array('date_of_birth, imgfiles, docfiles', 'safe'),
            array('imgfiles', 'file',
                'allowEmpty' => true,
                'types' => 'pdf,jpg,jpeg,gif,png',
                'maxSize' => 1024 * 1024 * 50, // 50MB
                'tooLarge' => 'The file is larger than 50MB. Please upload a smaller file.',
                'on' => 'create, update, insert, documents, view, upload',
            ),
            array('docfiles', 'file',
                'allowEmpty' => true,
                'types' => 'pdf,doc,docx,txt',
                'maxSize' => 1024 * 1024 * 50, // 50MB
                'tooLarge' => 'The file is larger than 50MB. Please upload a smaller file.',
                'on' => 'create, update, insert, documents, view, upload',
            ),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('cf, documento, user_id, name, lastname, firstname, last_name, date_of_birth, gender, cell, skills, experience_description, country, city, street, cap, photo, resume, profile_type, education, about_me, social_id', 'safe', 'on' => 'search'),
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
        switch ($this->scenario) {
            case 'employer':
                return array(// employers end up here
                     'user_id' => __('User'),
                    'name' => __('Name'),
                    'lastname' => __('Lastname'),
                    'firstname' => __('Firstname'),
                    'last_name' => __('Last Name'),
                    'date_of_birth' => __('Date Of Birth'),
                    'gender' => __('Gender'),
                    'cell' => __('Cell'),
                    'skills' => __('Skills'),
                    'experience_description' => __('Experience Description'),
                    'country' => __('Country'),
                    'city' => __('City'),
                    'street' => __('Street'),
                    'cap' => __('Cap'),
                    'imgfiles' => __('Upload Image'),
                    'docfiles' => __('Upload Resume'),
                    'photo' => __('Photo'),
                    'resume' => __('Resume'),
                    'profile_type' => __('Profile Type'),
                    'education' => __('Education'),
                    'about_me' => __('Company Info'),
                    'social_id' => __('Social'),
                    'cf' => __('Codice Fiscale'),
                    'documento' => __('Numero Documento'),
                );
                break;
            default: // employees end up here
                return array(
                    'user_id' => __('User'),
                    'name' => __('Name'),
                    'lastname' => __('Lastname'),
                    'firstname' => __('Firstname'),
                    'last_name' => __('Last Name'),
                    'date_of_birth' => __('Date Of Birth'),
                    'gender' => __('Gender'),
                    'cell' => __('Cell'),
                    'skills' => __('Skills'),
                    'experience_description' => __('Experience Description'),
                    'country' => __('Country'),
                    'city' => __('City'),
                    'street' => __('Street'),
                    'cap' => __('Cap'),
                    'imgfiles' => __('Upload Image'),
                    'docfiles' => __('Upload Resume'),
                    'photo' => __('Photo'),
                    'resume' => __('Resume'),
                    'profile_type' => __('Profile Type'),
                    'education' => __('Education'),
                    'about_me' => __('About Me'),
                    'social_id' => __('Social'),
                    'cf' => __('Codice Fiscale'),
                    'documento' => __('Numero Documento'),
                );
                break;
        }
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('date_of_birth', $this->date_of_birth, true);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('cell', $this->cell, true);
        $criteria->compare('skills', $this->skills, true);
        $criteria->compare('experience_description', $this->experience_description, true);
        $criteria->compare('country', $this->country);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('street', $this->street, true);
        $criteria->compare('cap', $this->cap);
        $criteria->compare('photo', $this->photo, true);
        $criteria->compare('resume', $this->resume, true);
        $criteria->compare('profile_type', $this->profile_type);
        $criteria->compare('education', $this->education, true);
        $criteria->compare('about_me', $this->about_me, true);
        $criteria->compare('social_id', $this->social_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            $this->date_of_birth = !empty($this->date_of_birth) ? date('Y-m-d', strtotime($this->date_of_birth)) : null;
            return true;
        } else {
            return false;
        }
    }

}