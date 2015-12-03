<?php
return array(
	'_root_' => 'page/view',
	'(create|edit|revision|list)' => 'page/$1',
	'revision/(:num)' => 'page/view//$1',
	'(:segment)/(create|edit|revision|delete)' => 'page/$2/$1',
	'(:segment)/revision/(:num)' => 'page/view/$1/$2',
	'(:segment)' => 'page/view/$1',
);
