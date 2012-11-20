<?php
class Notifier {
    function comment($event){
        $text = “There was new comment from {$event->comment->author} on post {$event->post->title}”;
        mail('admin@example.com', 'New comment', $text);
    }
}
