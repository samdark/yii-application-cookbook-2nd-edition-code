<?php
class DashboardController extends CController
{
	public function filters()
	{
		return array(
			array(
				'COutputCache +index',
				// will expire in a year
				'duration'=>24*3600*365,
				'dependency'=>array(
					'class'=>'CChainedCacheDependency',
					'dependencies'=>array(
						new CGlobalStateCacheDependency('article'),
						new CDbCacheDependency('SELECT id FROM account ORDER BY id DESC LIMIT 1'),
					),
				),
			),
		);
	}

	public function actionIndex()
	{
		$db = Account::model()->getDbConnection();
		$total = $db->createCommand("SELECT SUM(amount) FROM account")->queryScalar();

		$criteria = new CDbCriteria();
		$criteria->order = "id DESC";
		$criteria->limit = 5;
		$articles = Article::model()->findAll($criteria);

		$this->render('index', array(
			'total' => $total,
			'articles' => $articles,
		));
	}

	public function actionRandomOperation()
	{
		$rec = new Account();
		$rec->amount = rand(-1000, 1000);
		$rec->save();

		echo "OK";
	}

	public function actionRandomArticle()
	{
		$n = rand(0, 1000);

		$article = new Article();
		$article->title = "Title #".$n;
		$article->text = "Text #".$n;
		$article->save();

		Yii::app()->setGlobalState('article', $article->id);

		echo "OK";
	}
}
