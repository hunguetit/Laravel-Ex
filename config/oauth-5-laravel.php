<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Facebook' => [
		    'client_id'     => '1641296222779625',
		    'client_secret' => '0b51508c90a6510a84ae7dfad6216f9b',
		    'scope' 		=> array('email','user_likes'),
		],
	]
];