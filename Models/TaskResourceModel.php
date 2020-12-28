<?php
namespace MVC\Models;

use MVC\Core\ResourceModel;
use MVC\Models\TaskModel;

 class TaskResourceModel extends ResourceModel{
 	function __construct(){
 		$this->_init('tasks', 'id', new TaskModel);
 	}
 }
?>