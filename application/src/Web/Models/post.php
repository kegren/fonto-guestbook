<?php
/**
 * Post model
 */

namespace Web\Models;

use Fonto\Core\Model;

class Post extends Model
{

	public function validation($data = array())
	{
		$error = array();
		$valid = false;

		if ($data['user'] == '' or strlen($data['user']) < 2) {
			$error['user'] = 'Ditt namn måste bestå av minst 2 bokstäver.';
		}

		if ($data['title'] == '' or strlen($data['title']) < 5) {
			$error['title'] = 'Titeln måste vara minst 5 bokstäver.';
		}

		if ($data['post'] == '' or strlen($data['post']) < 7) {
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