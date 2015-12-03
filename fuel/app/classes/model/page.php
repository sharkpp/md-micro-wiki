<?php

class Model_Page extends \Orm\Model_Temporal
{
	protected static $_properties = array(
		'id',
		'temporal_start',
		'temporal_end',
		'title',
		'body',
		'body_html',
		'brief',
	);


	protected static $_temporal = array(
		'mysql_timestamp' => false,
	);

	protected static $_primary_key = array('id', 'temporal_start', 'temporal_end');

	protected static $_table_name = 'pages';

}
