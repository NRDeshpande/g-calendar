<?php

return [
	'default' => [
		'type'       => 'MySQLi',
		'connection' => [
			'hostname'   => 'localhost',
			'database'   => 'g_calender',
			'username'   => 'root',
			'password'   => FALSE,
			'persistent' => FALSE,
			'ssl'        => NULL,
		],
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	]
];
