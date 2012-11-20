<?php
class BlogController extends Controller
{
	function actionIndex()
	{
		$this->layout = 'blog';
		$this->render('//site/index');
	}
}
