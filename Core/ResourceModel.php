<?php 
namespace MVC\Core;

use MVC\Config\Database;
use PDO;

 class ResourceModel implements ResourceModelInterface{
 	protected $table;
 	protected $id;
 	protected $model;
 	function _init($table,$id,$model){
 		$this->table= $table;
 		$this->id=$id;
 		$this->model=$model;
 	}
	function save($model){
		$data=$model->getProperties();
		$dataKey=array_keys($data);
		$update=[];
		if(is_null($data['id']))
		{
			unset($dataKey[0]);
			unset($data['id']);
			$data['created_at']=date('Y-m-d H:i:s');
			$arrsql=implode(" , ",$dataKey);
			$arrsqlp= ":" . implode(" , :",$dataKey);
			$sql = "INSERT INTO $this->table ({$arrsql}) VALUES ({$arrsqlp})";
		}
		else{
			unset($dataKey[0]);
			unset($dataKey[3]);
			$data['updated_at']=date('Y-m-d H:i:s');
			unset($data['created_at']);
			foreach ($dataKey as $value) {
				array_push($update, $value.' = :'.$value);
			}
			$update=implode(" , ",$update);
			$sql ="UPDATE $this->table SET {$update} WHERE id=:id";
			echo $sql;
			echo "<br>";
			print_r($data);
		}
		$req = Database::getBdd()->prepare($sql);
		return $req->execute($data);
	}
	function delete($model){
		$sql = "DELETE FROM $this->table WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$model->getId()]);
	}

	function get($id){
		$sql = "SELECT * FROM $this->table WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
	}
	function getAll()
	{
		$sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
	}

 }

 ?>