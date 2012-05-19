<?php
class RunnableTest extends BaseTestcase {
	public static $browsers = array(
      array(
        'name'    => 'Firefox',
        'browser' => 'firefox',
        'host'    => 'server2.bcslichfield.com',
        'port'    => 4444,
        'timeout' => 30000
      ),array(
        'name'    => 'Chrome',
        'browser' => 'chrome',
        'host'    => 'server2.bcslichfield.com',
        'port'    => 4444,
        'timeout' => 30000
      ));
	
	
	
	public function test_RunnableTest() {
		//require_once "htdocs/index.php";
		//unused();
		$this->assertEquals(true, true);
		$this->get(\Core\Router::$settings['site']['address']);
		sleep(10);
	}
}