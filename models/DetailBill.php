<?php 
require_once('models/Connection.php');
require_once('models/Product.php');
class DetailBill extends Model{
	var $conn;
	var $table_name='detail_bill';
	var $primary_key='bill_code';
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
		$product= new Product();

		$sql ="SELECT * FROM ".$this->table_name."  where ".$this->primary_key." ='".$code."'";
		
		$result = $this->conn->query($sql);

		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] =$row;

		}

		foreach ($data as $key => $product_code) {
			$prod= $product->find($product_code['product_id']);
			$data[$key]['product_name']=$prod['name'];
			
		// echo "<pre>";
		//  		print_r($d);
		//  	echo "</pre>";
		//  	echo "<pre>";
		//  		print_r($prod);
		//  	echo "</pre>";
		//  	die;
		}
			
		return $data;
	}

	function create($data){

		$query ="INSERT INTO detail_bill(bill_code,product_id,quantity_buy,into_money) VALUES('".$data['bill_code']."','".$data['product_id']."','".$data['quantity_buy']."','".$data['into_money']."')";
		$result = $this->conn->query($query);
		echo $result;
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
	
}
?>