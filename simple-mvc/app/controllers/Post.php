<?php 

/**
* 
*/
class Post extends Controller
{
	
	function __construct()
	{
		# code...
	}

	public function index($ten)
	{
		//echo 'Day la trang index';
		$user = $this->model('User');
		$user->name = $ten;
		//echo $user->name;

		$this->view('post/index', ['name'=>$ten]);
	}

	public function show($id, $slug)
	{
		echo 'show';
		echo $id;
		echo $slug;
	}
}

?>