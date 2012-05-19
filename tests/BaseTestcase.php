<?php
abstract class BaseTestcase extends Selenium2TestCase
{
	public $coverageScriptUrl;
	public $coverageDomain;
	public static $browsers = array(
      array(
        'name'    => 'Firefox',
        'browser' => 'firefox',
        'host'    => 'server2.bcslichfield.com',
        'port'    => 4444,
        'timeout' => 30000,
      ),
      array(
        'name'    => 'Google Chrome',
        'browser' => 'chrome',
        'host'    => 'server2.bcslichfield.com',
        'port'    => 4444,
        'timeout' => 30000,
      ),
      array(
        'name'    => 'Internet Explorer',
        'browser' => 'internet explorer',
        'host'    => 'server2.bcslichfield.com',
        'port'    => 4444,
        'timeout' => 30000,
      ),
      array(
        'name'    => 'Opera',
        'browser' => 'opera',
        'host'    => 'server2.bcslichfield.com',
        'port'    => 4444,
        'timeout' => 30000,
      )
    );
	
	public static function setUpBeforeClass() {
		self::$browsers = \Core\Router::$settings['test']['browsers'];
	}
	
	protected function setUp() {
		$this->coverageScriptUrl = __DIR__.'../build/Selenium2PHPUnit/phpunit_coverage.php';
		$this->coverageDomain = \Core\Router::$settings['site']['address'];
		parent::setUp();
	}
	
	
	public function login()
	{
		$this->get(\Core\Router::$settings['site']['address']."/login");
		$this->assertEquals(\Core\Router::$settings['site']['address'].'/sitemap/', $this->getCurrentUrl());
	}
	
	public function logout()
	{
		$this->get(\Core\Router::$settings['site']['address']."/login/out");
		$this->assertEquals(\Core\Router::$settings['site']['address'].'/', $this->getCurrentUrl());
	}
	
	protected function doCommit() {
		try {
			$element = $this->findElementBy(LocatorStrategy::cssSelector, "#change_queue .badge-success");
		} catch (NoSuchElementException $e) {
			$this->fail("The editor did not process the commit properly for '{$this->drivers[0]->getBrowser()}'");
			return;
		}
		$element->click();
		sleep(2);
	}
}
