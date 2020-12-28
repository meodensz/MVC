<?php 
namespace MVC\Models;

use MVC\Models\TaskResourceModel;

	class TaskRepository
	{
		protected $TaskResourceModel;

		function __construct(){
			$this->TaskResourceModel=new TaskResourceModel();
		}
		function add($model)
		{
			return $this->TaskResourceModel->save($model);
		}
		function get($id)
		{
			return $this->TaskResourceModel->get($id);
		}
		function delete($model)
		{
			return $this->TaskResourceModel->delete($model);
		}
		function getAll()
		{
			return $this->TaskResourceModel->getAll();
		}
	}
 ?>