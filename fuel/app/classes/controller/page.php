<?php

class Controller_Page extends Controller_Template
{

	public function action_list()
	{
		$data["subnav"] = array('list'=> 'active' );
		$this->template->title = 'Page &raquo; List';
		$this->template->content = View::forge('page/list', $data);
	}

	public function action_view($name = '', $timestamp = null)
	{
		if ( ! $page = Model_Page::get_by_title($name, $timestamp) ) {
			if ( $timestamp) {
				throw new HttpNotFoundException;
			}
			Response::redirect($name . '/edit');
		}

		$this->template->title = (empty($name) ? '(top)' : $name);
		$this->template->name = $name;
		$this->template->content = View::forge('page/view')
		                            ->set_safe('page', $page);
	}

	public function action_revision()
	{
		$data["subnav"] = array('revision'=> 'active' );
		$this->template->title = 'Page &raquo; Revision';
		$this->template->content = View::forge('page/revision', $data);
	}

	public function action_edit()
	{
		$data["subnav"] = array('edit'=> 'active' );
		$this->template->title = 'Page &raquo; Edit';
		$this->template->content = View::forge('page/edit', $data);
	}

	public function action_delete()
	{
		$data["subnav"] = array('delete'=> 'active' );
		$this->template->title = 'Page &raquo; Delete';
		$this->template->content = View::forge('page/delete', $data);
	}

}
