<?php
namespace MVC\Models;

use MVC\Core\Model;

 class TaskModel extends Model
 {
 	protected $id;
 	protected $title;
 	protected $description;
 	protected $created_at;
 	protected $updated_at;

 	function getId()
 	{
 		return $this->id;
 	}

 	function setId($id)
 	{
 		$this->id=$id;
 	}

 	function getTitle()
 	{
 		return $this->title;
 	}

 	function setTitle($title)
 	{
 		$this->title=$title;
 	}

 	function getDescription()
 	{
 		return $this->description;
 	}

 	function setDescription($description)
 	{

 		$this->description=$description;
 	}

 	function getCreated_at()
 	{
 		return $this->created_at;
 	}

 	function setCreated_at($created_at)
 	{
 		$this->created_at=$created_at;
 	}

 	function getUpdated_at()
 	{
 		return $this->updated_at;
 	}
 	
 	function setUpdated_at($updated_at)
 	{
 		$this->updated_at=$updated_at;
 	}
 	
 }
?>