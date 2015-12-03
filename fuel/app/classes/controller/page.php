<?php

class Controller_Page extends Controller_Template
{

	public function action_list()
	{
		$data["subnav"] = array('list'=> 'active' );
		$this->template->title = 'Page &raquo; List';
		$this->template->content = View::forge('page/list', $data);
	}

	public function action_view()
	{
		$data["subnav"] = array('view'=> 'active' );
		$this->template->title = 'Page &raquo; View';
		$this->template->content = View::forge('page/view', $data);
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
