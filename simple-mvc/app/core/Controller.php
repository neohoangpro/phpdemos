<?php 

/**
* 
*/
class Controller
{
	
	function __construct()
	{
		# code...
	}

	public function model($model)
	{
		//echo $model;
		require_once 'app/models/'.$model.'.php';
		return new $model;
	}

	public function view($view, $data=[])
	{
		require_once 'app/views/'.$view.'.php';
	}
}

?>