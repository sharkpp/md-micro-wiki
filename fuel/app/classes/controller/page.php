<?php

class Controller_Page extends Controller_Template
{

	public function action_list()
	{
		$data['pages'] = Model_Page::find('all');

		$this->template->title = 'List of all pages';
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

	public function action_edit($name = '')
	{
		$page = Model_Page::get_by_title($name);
		$new_page = ! $page;

		if (Input::method() == 'POST') {
			$val = Model_Page::validate($new_page ? 'create' : 'edit');
			if ($val->run(array('title' => $name))) {
				$page = $page ?: Model_Page::forge();
				$page->title = $val->validated('title');
				$page->body  = $val->validated('body');
				$page->brief = $val->validated('brief');
				if (!Input::post('preview')) {
					if ($page->save()) {
						Session::set_flash('success', $new_page ? 'Added page.' : 'Updated page.');
						Response::redirect($name);
					}
					else {
						Session::set_flash('error', $new_page ? 'Could not save page.' : 'Could not update page.');
					}
				}
			}
			else {
				Session::set_flash('error', $val->error());
			}
			$this->template->set_global('body_html', Model_Page::parse_markdown(Input::post('body')), false);
		}
		else if ($page) {
			$page->brief = '';
		}

		$this->template->set_global('page', $page, false);

		$this->template->title = ($new_page ? 'Creating ' : 'Editing ') . (empty($name) ? '(top)' : $name);
		$this->template->name = $name;
		$this->template->content = View::forge('page/edit');
	}

	public function action_delete()
	{
		$data["subnav"] = array('delete'=> 'active' );
		$this->template->title = 'Page &raquo; Delete';
		$this->template->content = View::forge('page/delete', $data);
	}

}
