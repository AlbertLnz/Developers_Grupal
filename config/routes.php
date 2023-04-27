<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
$routes = array(
	'/test' => 'test#index',
	'/' => 'application#index', //home page
	'/viewTask' => 'application#viewOneTask',
	'/editTask' => 'application#editOneTask',
	'/updateTask' => 'application#updateOneTask',
	'/deleteTask' => 'application#deleteOneTask',
	'/addTask' => 'application#addOneTask'
);
