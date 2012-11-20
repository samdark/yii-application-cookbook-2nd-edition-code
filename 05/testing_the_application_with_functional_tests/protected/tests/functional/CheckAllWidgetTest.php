<?php
class CheckAllWidgetTest extends WebTestCase
{
	public function testWidget()
	{
		$this->open('check/index');
		$this->assertEquals("Check all", $this->getAttribute("class=check-all-btn@value"));

		$this->click("class=check-all-btn");
		$this->assertChecked("css=input[type=checkbox]");
		$this->assertEquals("Uncheck all", $this->getAttribute("class=check-all-btn@value"));

		$this->click("class=check-all-btn");
		$this->assertNotChecked("css=input[type=checkbox]");
		$this->assertEquals("Check all", $this->getAttribute("class=check-all-btn@value"));
	}
}