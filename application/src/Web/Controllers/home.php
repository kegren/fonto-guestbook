<?php
/**
 * Homepage controller
 */

namespace Web\Controllers;

use Fonto\Core\Controller,
	Web\Models\Post;

class Home extends Controller
{
	public function indexAction()
	{
		$posts = new Post();

		$data = array(
			'title' => 'En gästbok..',
			'posts' => $posts->getAll()
		);

		if ($_POST) {
			$insert = array(
				'title' => $_POST['title'],
				'user'  => $_POST['user'],
				'post'  => $_POST['post'],
			);

			$validate = $posts->validation($insert);

			if ($validate === true) {
				// $data['success'] = 'Ditt inlägg är skapat!';
				$posts->insert($insert);
				redirect('/');
			} else {
				$data['error'] = $validate;
			}
		}

		return $this->view('home/index', $data);
	}
}