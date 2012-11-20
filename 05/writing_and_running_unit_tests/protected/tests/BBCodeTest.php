<?php
class BBCodeTest extends CTestCase
{
    private function process($bbCode)
    {
        $bb = new EBBCode();
        return $bb->process($bbCode);
    }
    
    function testSingleTags()
    {        
        $this->assertEquals('<strong>test</strong>', $this->process('[b]test[/b]'));
        $this->assertEquals('<em>test</em>', $this->process('[i]test[/i]'));
        $this->assertEquals(
            '<a href="http://yiiframework.com/">http://yiiframework.com/</a>',
            $this->process('[url]http://yiiframework.com/[/url]')
        );
        $this->assertEquals(
            '<a href="http://yiiframework.com/">yiiframework.com</a>', 
            $this->process('[url=http://yiiframework.com/]yiiframework.com[/url]')
        );
    }
    
    function testMultipleTags()
    {
        $this->assertEquals(
            '<strong>test1</strong> <strong>test2</strong>', 
            $this->process('[b]test1[/b] [b]test2[/b]')
        );
        $this->assertEquals(
            '<strong><em>test</em></strong>', 
            $this->process('[b][i]test[/i][/b]')
        );
    }
}