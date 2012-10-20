<?php
/**
 * Homepage controller
 */

namespace Web\Controllers;

use Fonto\Core\Controller,
	Fonto\Core\Url,
	Web\Models\Post;

class Home extends Controller
{
	public function indexAction()
	{
		$posts = new Post();
		$url   = new Url();

		$data = array(
			'title'   => 'En gästbok skapad med Fonto',
			'posts'   => $posts->getAll(),
			'baseUrl' => $url->baseUrl()
		);

		if (isset($_POST['submit'])) {
			$insert = array(
				'title' => $_POST['title'],
				'user'  => $_POST['user'],
				'post'  => $_POST['post'],
			);

			$validate = $posts->validation($insert);

			if ($validate === true) {
				// $data['success'] = 'Ditt inlägg är skapat!';
				$posts->insert($insert);
				redirect($url->baseUrl());
			} else {
				$data['error'] = $validate;
				$data['post']  = $_POST;
			}
		}

		return $this->view('home/index', $data);
	}
}