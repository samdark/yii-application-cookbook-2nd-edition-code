<?php
class WikiMarkdownParser extends CMarkdownParser
{
	public function transform($text)
	{
		$text = preg_replace_callback('~\[\[(.*?)(?:\|(.*?))?\]\]~', array($this, 'processWikiLinks'), $text);
		return parent::transform($text);
	}

	protected function processWikiLinks($matches)
	{
		$page = $matches[1];
		$title = isset($matches[2]) ? $matches[2] : $matches[1];
		return CHtml::link(CHtml::encode($title), array(
			'view', 'id' => $page,
		));
	}
}