<?php

class TestController extends CController
{
	public function actionIndex()
	{
		$post=new Post();
		$post->title='links test';
		$post->text='test http://www.yiiframework.com/ test';
		$post->save();
		print_r($post->text);
	}
}