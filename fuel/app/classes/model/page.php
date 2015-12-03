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

	protected static $_observers = array('Orm\\Observer_Self' => array(
    'events' => array('before_save')
	));
	
	public function _event_before_save()
	{
		$this->body_html = self::parse_markdown($this->body);
	}

	public static function parse_markdown($text)
	{
		$text = preg_replace('!\[\]\((.+?)\)!', '[$1]($1)', $text);
		return Markdown::parse(Security::xss_clean($text));
	}

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'max_length[255]|valid_string[specials,dashes]');
		$val->add_field('body', 'Body', 'required');
		$val->add_field('brief', 'Brief', 'max_length[255]');

		return $val;
	}

	public static function get_by_title($title, $timestamp = null)
	{
		$page = self::find('first',
											array(
												'where' => array( array('title', $title) )
						));

		if ( $page && $timestamp)
		{
			$page = self::find_revision($page->id, $timestamp);
		}

		return $page;
	}

	public static function enum_revisions_by_title($title)
	{
		if ( (! $page = self::get_by_title($title)) ||
				 (! $revisions = self::find_revisions_between($page->id)) )
		{
			return null;
		}
		return array_reverse($revisions);
	}

}
