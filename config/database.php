<?php
return [
	'default' => 'site',
	'connections' => [
		'site' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'database' => 'taos2_site',
			'username' => 'root',
			'password' => '012607',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
			'strict' => false,
		],
		'charts' => [
			'driver' => 'pgsql',
			'host' => 'localhost',
			'database' => 'taos2status',
			'username' => 'wlyen',
			'password' => '012607',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
			'strict' => false,
		],
	],
];