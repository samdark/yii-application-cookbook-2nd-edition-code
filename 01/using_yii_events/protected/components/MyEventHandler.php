<?php
class MyEventHandler
{
    static function handleMissingTranslation($event)
    {
       	 // event class for this event is CMissingTranslationEvent
        // so we can get some info about the message
        $text = implode(“\n”, array(
           'Language: '.$event->language,
           'Category:'.$event->category,
           'Message:'.$event->message
        ));
        // sending email
        mail('admin@example.com', 'Missing translation', $text);
    }
}
