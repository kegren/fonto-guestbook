<?php

namespace Web\Models;

use Fonto\Core\Model;

class Post extends Model
{

	public function validation($user = '', $title = '', $post = '')
	{
		$error = array();
		$valid = false;

		if ($user == '' or strlen($user) < 2) {
			$error['user'] = 'Du heter förmodligen något annat.';
		}

		if ($title == '' or strlen($title) < 5) {
			$error['title'] = 'Titeln måste vara minst 5 bokstäver.';
		}

		if ($post == '' or strlen($post) < 7) {
			$error['post'] = 'Meddelandet måste vara minst 7 bokstäver långt.';
		}

		if (empty($error)) {
			return true;
		}

		return $error;
	}


	public function getAll()
	{
		return Post::find('all');
	}

	public function insert($data = array())
	{
		Post::create($data);
	}
}