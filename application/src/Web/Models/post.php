<?php

namespace Web\Models;

use Fonto\Core\Model;

class Post extends Model
{

	public function getAll()
	{
		return Post::find('all');
	}


}