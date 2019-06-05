<?php 
require_once('models/Model.php');
class Employee extends Model{
	var $conn;
	var $table_name='employees';
	var $primary_key='id';
	function check($data){
		$sql ="SELECT * FROM employees where email='".$data['username']."' and password='".md5($data['password'])."'";

		$result= $this->conn->query($sql)->fetch_assoc();
		return $result;
	}
	public function deactive($code){
			$query ="UPDATE ".$this->table_name." SET status=0 WHERE ".$this->primary_key." ='".$code."'";
			$status = $this->conn->query($query);
			return $status;
		}

	public function active($code){
			$query ="UPDATE ".$this->table_name." SET status=1 WHERE ".$this->primary_key." ='".$code."'";
			$status = $this->conn->query($query);
			return $status;
		}
}
?>