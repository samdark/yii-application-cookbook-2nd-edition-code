<?php

class MyEventHandler
{
	/**
	 * @param CMissingTranslationEvent $event
	 */
	public static function handleMissingTranslation($event)
	{
		// The event class for this event is CMissingTranslationEvent,
		// so we can get some info about the untranslated message from it.
		$text = implode("\n", array(
			'Language: '.$event->language,
			'Category:'.$event->category,
			'Message:'.$event->message
		));
		// sending email
		mail('admin@example.com', 'Missing translation', $text);
	}
}
