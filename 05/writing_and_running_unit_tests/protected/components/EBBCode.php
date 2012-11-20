<?php
class EBBCode
{
    function process($string)
    {
        $preg = array(
            '~\[b\](.*?)\[/b\]~i' => '<strong>$1</strong>',
            '~\[i\](.*?)\[/i\]~i' => '<em>$1</em>',
            '~\[url\](.*?)\[/url\]~i' => '<a href="$1">$1</a>',
            '~\[url=([^]]+)\](.*?)\[/url\]~i' => '<a href="$1">$2</a>',            
        );
        return preg_replace(array_keys($preg), array_values($preg), $string);
    }
}
