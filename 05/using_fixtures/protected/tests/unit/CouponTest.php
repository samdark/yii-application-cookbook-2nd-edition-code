<?php
class CouponTest extends CDbTestCase
{
	public $fixtures = array(
		'coupon' => 'Coupon',
	);

	public static function setUpBeforeClass()
	{
		if(!extension_loaded('pdo') || !extension_loaded('pdo_sqlite'))
			markTestSkipped('PDO and SQLite extensions are required.');

		$config=array(
			'basePath'=>dirname(__FILE__),
			'components'=>array(
				'db'=>array(
					'class'=>'system.db.CDbConnection',
					'connectionString'=>'sqlite::memory:',
				),
				'fixture'=>array(
					'class'=>'system.test.CDbFixtureManager',
				),
			),
		);

		Yii::app()->configure($config);

		$c = Yii::app()->getDb()->createCommand();
		$c->createTable('coupon', array(
			'id' => 'varchar(255) PRIMARY KEY NOT NULL',
			'description' => 'text',
		));
	}

	protected function setUp()
	{
		parent::setUp();
		$_GET['existing_code'] = 'discount_for_me';
		$_GET['non_existing_code'] = 'non_existing';
	}

	public static function tearDownAfterClass()
	{
		if(Yii::app()->getDb())
			Yii::app()->getDb()->active=false;
	}

	public function testCodeAcceptance()
	{
		$cm = new CouponManager();
		$this->assertTrue($cm->registerCoupon($_GET['existing_code']));
		$this->assertFalse((boolean)Coupon::model()->findByPk($_GET['existing_code']));
	}

	public function testCodeNotFound()
	{
		$countBefore = Coupon::model()->count();

		$cm = new CouponManager();
		$this->assertFalse($cm->registerCoupon($_GET['non_existing_code']));

		$countAfter = Coupon::model()->count();
		$this->assertEquals($countBefore, $countAfter);
	}
}

class CouponManager
{
	function registerCoupon($code)
	{
		$coupon = Coupon::model()->findByPk($code);
		if(!$coupon)
			return false;

		echo "Coupon registered. $coupon->description";
		return $coupon->delete();
	}
}