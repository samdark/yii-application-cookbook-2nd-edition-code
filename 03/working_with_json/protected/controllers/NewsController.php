<?php
class NewsController extends Controller
{
	public function filters()
	{
		return array(
			'ajaxOnly + data',
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionData()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'created_on DESC';
		$criteria->limit = 10;
		$news = News::model()->findAll($criteria);

		echo CJSON::encode($news);
	}

	public function actionAddRandomNews()
	{
		$news = new News();
		$news->title = "Item #".rand(1, 10000);
		$news->created_on = time();
		$news->save();
		echo "OK";
	}
}