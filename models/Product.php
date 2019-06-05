<?php 
require_once('models/Model.php');
class Product extends Model{

		var $conn;
		var $table_name='products';
		var $primary_key='id';

		function All2(){
			$sql = "SELECT p.*, c.name as category_name FROM products p JOIN categories c on p.category_id = c.`id`";
		$result = $this->conn->query($sql);

		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] =$row;

		}

		return $data;
		}
		function reduceQuantity($product_code,$quantity_buy){
			$quantity_con=$this->getQuantity($product_code)-$quantity_buy;
			$quantity_sold=$this->getQuantitySold($product_code)+$quantity_buy;
			$query ="UPDATE ".$this->table_name." SET quantity = ".$quantity_con.", quantity_sold=".$quantity_sold." WHERE ".$this->primary_key."= '".$product_code."'";
			$result = $this->conn->query($query);
			return $result;

		}
		function getQuantity($code){
			$query = "SELECT quantity FRom ".$this->table_name." WHERE ".$this->primary_key." = '".$code."' ";
			$result = $this->conn->query($query)->fetch_assoc()['quantity'];
			return $result;

		}
		function getQuantitySold($code){
			$query = "SELECT quantity FRom ".$this->table_name." WHERE ".$this->primary_key." = '".$code."' ";
			$result = $this->conn->query($query)->fetch_assoc()['quantity_sold'];
			return $result;

		}
		function search_name($name){
			$sql="SELECT * FROM products WHERE name LIKE '%".$name['search']."%'";
			// echo $sql;
			$result = $this->conn->query($sql);
			$data = array();
			while ($row = $result->fetch_assoc()) {
			$data[] =$row;

			}
				// echo "<pre>";
			 // 		print_r($data);
			 // 	echo "</pre>";
			 // 	die;
			return $data;
		}
		public function hot($code){
			$query ="UPDATE ".$this->table_name." SET hot=1 WHERE ".$this->primary_key." ='".$code."'";


		
		$status = $this->conn->query($query);
		return $status;
		}
		public function unhot($code){
			$query ="UPDATE ".$this->table_name." SET hot=0 WHERE ".$this->primary_key." ='".$code."'";


		
		$status = $this->conn->query($query);
		return $status;
		}

	
	
	
	

}
?>