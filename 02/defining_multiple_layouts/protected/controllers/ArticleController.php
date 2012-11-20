<?php
class ArticleController extends Controller
{
	function actionIndex()
	{
		$this->layout = 'articles';
		$this->render('//site/index');
	}
}
