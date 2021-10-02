<?php
Router::parseExtensions('json', 'xml');

Router::connect('/', array('controller' => 'Pages', 'action' => 'home'));
// Router::connect('/', array('controller' => 'admin', 'action' => 'index'));
/*
Router::connect('/news', array(
	'controller' => 'news',
	'action' => 'index',
),
	array('named' => array('page' => 1))
);
*/
/*
Router::connect('/news/:slug',
	array(
		'controller' => 'News',
		'action' => 'view',
	),
	array('pass' => array('slug'))
);
*/
/* Pagination route does not work :(
Router::connect('/news/page/:page', array(
	'controller' => 'news',
	'action' => 'index',
),
	array('named' => array('page' => '[\d]*'))
);
*/
Router::connect('/products', array(
		'controller' => 'Products',
		'action' => 'index',
	),
	array('named' => array('page' => 1))
);
Router::connect('/products/:slug',
	array(
		'controller' => 'Products',
		'action' => 'view',
	),
	array('pass' => array('slug'))
);
Router::connect('/products/page/:page', array(
		'controller' => 'Products',
		'action' => 'index',
	),
	array('named' => array('page' => '[\d]*'))
);


	CakePlugin::routes();
	require CAKE . 'Config' . DS . 'routes.php';
