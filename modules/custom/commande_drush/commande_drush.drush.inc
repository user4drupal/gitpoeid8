<?php
function commande_drush_drush_command(){
	$items = array();
	$items['hello-world'] = [
		'description' => 'settings URL games and Video each environement',
		'arguments' => [
			'name' => 'Setting URL services environnements',
	],
	'aliases' => ['hr'],
	];
	return $items;
}

function drush_commande_drush_hello_world(){
	echo "hello world";
}
