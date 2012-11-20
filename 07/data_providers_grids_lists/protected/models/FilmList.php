<?php

/**
 * This is the model class for table "film_list".
 *
 * The followings are the available columns in table 'film_list':
 * @property integer $FID
 * @property string $title
 * @property string $description
 * @property string $category
 * @property string $price
 * @property integer $length
 * @property string $rating
 * @property string $actors
 */
class FilmList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FilmList the static model class
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
		return 'film_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FID, length', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('category', 'length', 'max'=>25),
			array('price', 'length', 'max'=>4),
			array('rating', 'length', 'max'=>5),
			array('actors', 'length', 'max'=>341),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('FID, title, description, category, price, length, rating, actors', 'safe', 'on'=>'search'),
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
			'FID' => 'Fid',
			'title' => 'Title',
			'description' => 'Description',
			'category' => 'Category',
			'price' => 'Price',
			'length' => 'Length',
			'rating' => 'Rating',
			'actors' => 'Actors',
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

		$criteria->compare('FID',$this->FID);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('length',$this->length);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('actors',$this->actors,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}