<?php

class CheckAllWidgetTest extends CWebTestCase
{
	/**
	 * Sets up before each test method runs.
	 */
	protected function setUp()
	{
		parent::setUp();
		// set the base URL for the test application.
		$this->setBrowserUrl('http://localhost/test-application');
	}

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