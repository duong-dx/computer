<?php
require_once('models/Model.php');
class Slide extends Model{
	
		var $conn;
		var $table_name='slides';
		var $primary_key='id';

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