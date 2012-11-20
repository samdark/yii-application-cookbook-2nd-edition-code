<?php
class QuoteController extends Controller
{
	private $quotes = array(
		array('Walking on water and developing software from a specification are easy if both are frozen.', 'Edward V Berard'),
		array('It always takes longer than you expect, even when you take into account Hofstadter&rsquo;s Law.', 'Hofstadter&rsquo;s Law'),
		array('Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.', 'Rick Osborne'),
		array('I have always wished for my computer to be as easy to use as my telephone; my wish has come true because I can no longer figure out how to use my telephone.', 'Bjarne Stroustrup'),
		array('Java is to JavaScript what Car is to Carpet.', 'Chris Heilmann'),
	);

	private function getRandomQuote()
	{
		return $this->quotes[array_rand($this->quotes, 1)];
	}

	function actionIndex()
	{
		$this->render('index', array(
			'quote' => $this->getRandomQuote()
	    ));
	}

	function actionGetQuote()
	{
		$this->renderPartial('_quote', array(
			'quote' => $this->getRandomQuote(),
		));
	}
}