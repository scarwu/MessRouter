Mess Router
===========

### Description

Mess Router is a Tiny Restful Router for Small-scale Project

### Requirement

* PHP 5.3+

#### How to use

	<?php
	 
	require_once '/path/to/MessRouter.php';
	
	$Router = new MessRouter($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
	
	// 
	// array(
	// 	array($path, $callback, $method, $full_regex),
		array($path, $callback, $method, $full_regex),
	// 	...
	// )
	
	// Add Route for HTTP Get Method
	$Router->AddRouteList(array(
		array('/:string/:string.html', function($result) {
			echo 'GET /:string/:string.html => ';
			print_r($result);
		}),
		array('/:string(?:/)?', function($result) {
			echo 'GET /:string(?:/)? => ';
			print_r($result);
		}),
		array('default', function() {
			echo 'GET Default Route';
		})
	));
	
	// Add Route for HTTP Post Method
	$Router->AddRouteList(array(
		array('/user/:string', function($result) {
			echo 'POST /user/:string => ';
			print_r($result);
		}, 'POST'),
		array('/file', function($result) {
			echo 'POST /file => ';
			print_r($result);
		}, 'POST'),
		array('default', function() {
			echo 'POST Default Route';
		}, 'POST')
	));
	
	// Run Router
	$Router->Run();
