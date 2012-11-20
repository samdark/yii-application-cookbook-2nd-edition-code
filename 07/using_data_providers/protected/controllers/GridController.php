<?php
class GridController extends Controller
{
	public function actionAR()
	{
		$dataProvider = new CActiveDataProvider('Film', array(
			'pagination'=>array(
				'pageSize'=>10,
			),
			'sort'=>array(
				'defaultOrder'=> array('title'=>false),
			)
		));

		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionArray()
	{
		$yiiDevelopers = array(
			array(
				'name'=>'Qiang Xue',
				'id'=>'2',
				'forumName'=>'qiang',
				'memberSince'=>'Jan 2008',
				'location'=>'Washington DC, USA',
				'duty'=>'founder and project lead',
				'active'=>true,
			),
			array(
				'name'=>'Wei Zhuo',
				'id'=>'3',
				'forumName'=>'wei',
				'memberSince'=>'Jan 2008',
				'location'=>'Sydney, Australia',
				'duty'=>'project site maintenance and development',
				'active'=>true,
			),
			array(
				'name'=>'Sebastián Thierer',
				'id'=>'54',
				'forumName'=>'sebas',
				'memberSince'=>'Sep 2009',
				'location'=>'Argentina',
				'duty'=>'component development',
				'active'=>true,
			),
			array(
				'name'=>'Alexander Makarov',
				'id'=>'415',
				'forumName'=>'samdark',
				'memberSince'=>'Mar 2010',
				'location'=>'Russia',
				'duty'=>'core framework development',
				'active'=>true,
			),
			array(
				'name'=>'Maurizio Domba',
				'id'=>'2650',
				'forumName'=>'mdomba',
				'memberSince'=>'Aug 2010',
				'location'=>'Croatia',
				'duty'=>'core framework development',
				'active'=>true,
			),
			array(
				'name'=>'Y!!',
				'id'=>'1644',
				'forumName'=>'Y!!',
				'memberSince'=>'Aug 2010',
				'location'=>'Germany',
				'duty'=>'core framework development',
				'active'=>true,
			),
			array(
				'name'=>'Jeffrey Winesett',
				'id'=>'15',
				'forumName'=>'jefftulsa',
				'memberSince'=>'Sep 2010',
				'location'=>'Austin, TX, USA',
				'duty'=>'documentation and marketing',
				'active'=>true,
			),
			array(
				'name'=>'Jonah Turnquist',
				'id'=>'127',
				'forumName'=>'jonah',
				'memberSince'=>'Sep 2009 - Aug 2010',
				'location'=>'California, US',
				'duty'=>'component development',
				'active'=>false,
			),
			array(
				'name'=>'István Beregszászi',
				'id'=>'1286',
				'forumName'=>'pestaa',
				'memberSince'=>'Sep 2009 - Mar 2010',
				'location'=>'Hungary',
				'duty'=>'core framework development',
				'active'=>false,
			),
		);

		$dataProvider = new CArrayDataProvider($yiiDevelopers, array(
			'sort'=>array(
				'attributes'=>array('name', 'id', 'active'),
				'defaultOrder'=>array('active' => true, 'name' => false),
			),
			'pagination'=>array(
				'pageSize'=>10,
			),
		));

		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionSQL()
	{
		$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM film')->queryScalar();
		$sql='SELECT * FROM film';
		$dataProvider=new CSqlDataProvider($sql, array(
			'keyField'=>'film_id',
			'totalItemCount'=>$count,
			'sort'=>array(
				'attributes'=>array('title'),
				'defaultOrder'=>array('title' => false),
    		),
    		'pagination'=>array(
        		'pageSize'=>10,
    		),
		));

		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
}
