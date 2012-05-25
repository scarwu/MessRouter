<?php

require_once '../src/MessRouter.php';

class Route_Test extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider getProvider
	 */
	public function testGet($expected, $method, $path) {
		$Router = new MessRouter($method, $path);
		$Router->AddRouteList(array(
			array('/:string/:string.html', function() {}),
			array('/:string(?:/)?', function() {}),
			array('default', function() {})
		));
		$Router->Run();
		
		$this->assertEquals($expected, $Router->MatchRoute());
	}

	/**
	 * @dataProvider postProvider
	 */
	public function testPost($expected, $method, $path) {
		$Router = new MessRouter($method, $path);
		$Router->AddRouteList(array(
			array('/:string/:string', function() {}, 'POST'),
			array('/:string(?:/)?', function() {}, 'POST'),
			array('default', function() {}, 'POST')
		));
		$Router->Run();
		
		$this->assertEquals($expected, $Router->MatchRoute());
	}
	
	public function getProvider() {
		return array(
			array('', 'get', '/'),
			array('', 'get', '/welcome/index'),
			array('', 'get', '/welcome/index.html')
		);
	}
	
	public function postProvider() {
		return array(
			array('', 'post', '/'),
			array('', 'post', '/'),
		);
	}
}
