<?php
/**
 * Post model
 */

namespace Web\Models;

use Fonto\Core\Model;

class Post extends Model
{
	/**
	 * Validates data from the form
	 *
	 * @param  $data Containing post data
	 * @return mixed True if there is no error otherwise returning the error array
	 */
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

	/**
	 * Gets all posts and return an object
	 *
	 * @return object
	 */
	public function getAll()
	{
		return Post::find('all', array('order' => 'date desc'));
	}

	/**
	 * Inserts a record
	 *
	 * @param  $data
	 * @return Boolean True if the insert succeeded false otherwise
	 */
	public function insert($data = array())
	{
		Post::create($data);
	}
}