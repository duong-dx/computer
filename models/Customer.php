<?php 
require_once('models/Model.php');
class Customer extends Model{ 
		var $conn;
		var $table_name='customers';
		var $primary_key='id';
	
	function birthday($month,$day){
		$sql="SELECT * FROM customers WHERE customer_birthday LIKE '%-".$month."-".$day."'";
		$data = array();
		$result = $this->conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			$data[] =$row;

		}

		return $data;
	}
	function check($data){
		$sql ="SELECT * FROM customers where email='".$data['username']."' and password='".md5($data['password'])."'";

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