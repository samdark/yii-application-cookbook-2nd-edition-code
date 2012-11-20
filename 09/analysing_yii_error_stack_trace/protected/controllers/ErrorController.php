<?php
class ErrorController extends CController
{
	public function actionIndex()
	{
		$articles = $this->getModels('php');
		foreach($articles as $article)
		{
			echo $article->title;
			echo "<br />";
		}
	}

	private function getModels($alias)
	{
		$criteria = new CDbCriteria();
		$criteria->addSearchCondition('allas', $alias);
		return Article::model()->findAll($criteria);
	}
}
