<?php
/**
 * Mess Router Example
 * 
 * @package		MessRouter
 * @author		ScarWu
 * @copyright	Copyright (c) 2012, ScarWu (http://scar.simcz.tw/)
 * @link		http://github.com/scarwu/MessRouter
 */
 
require_once '../src/MessRouter.php';

// Route for GET Method
$GetRoute = array(
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
);

// Route for GET Method
$PostRoute = array(
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
);

// Route for PUT Method
// $PutRoute = array();

// Route for DELETE Method
// $DeleteRoute = array();

$MRouter = new MessRouter($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);

// Add Route Rule List
$MRouter->AddRouteList($GetRoute);
$MRouter->AddRouteList($PostRoute);

// Run Router
$MRouter->Run();
