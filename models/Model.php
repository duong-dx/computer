<?php 
require_once('models/Connection.php');
class Model{
	var $conn;
	var $table_name='';
	var $primary_key='';
	function __construct(){
		$conn_obj= new Connection();
		$this->conn = $conn_obj->conn;
	}

	function All(){
		
		$sql = "SELECT * FROM ".$this->table_name;
		$result = $this->conn->query($sql);

		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] =$row;

		}

		return $data;
	}
	function find($code){
		
		$sql ="SELECT * FROM ".$this->table_name."  where ".$this->primary_key." ='".$code."'";
		$data = $this->conn->query($sql)->fetch_assoc();
		return $data;
	} 
	function insert($data){
		$column='';
		$values='';

		foreach ($data as $col => $value) {
			$column.=$col.',';
			$values .="'".$value."',";
		}
		$column =trim($column,',');
		$values =trim($values,',');
		$query ="INSERT INTO ".$this->table_name."(".$column.") VALUE(".$values.")";
		
		$result = $this->conn->query($query);
		return $result;
	}
	function update($data){
		var_dump($data);
		$values ='';
		foreach ($data as $col => $value) {
			$values .= $col."='".$value."',";

		}
		$values =trim($values,',');
		$query ="UPDATE ".$this->table_name." SET ".$values." WHERE ".$this->primary_key." ='".$data[$this->primary_key]."'";


		
		$status = $this->conn->query($query);
		return $status;
	}
	function delete_process($code){
		
		$sql= "DELETE FROM ".$this->table_name." WHERE ".$this->primary_key." ='".$code."'";
		$status= $this->conn->query($sql);
		return $status;
		
	}
}
?>