<?php 
require_once('models/Model.php');
class User extends Model{

	var $conn;
	var $table_name='categories';
	var $primary_key='category_id';

	function All2(){
		$sql = "SELECT c.name as category_id,c.id as category_code,  p.* FROM categories c JOIN products p on p.category_id = c.`id`";
		$result = $this->conn->query($sql);

		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] =$row;

		}

		return $data;
	}
	function hot_product(){
		$sql = "SELECT c.name as category_id,c.id as category_code,  p.* FROM categories c JOIN products p on p.category_id = c.`id` where p.hot=1";
		$result = $this->conn->query($sql);

		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] =$row;

		}
			return $data;
		}
		function sale_Product(){
			$sql = "SELECT c.name as category_id,c.id as category_code,  p.* FROM categories c JOIN products p on p.category_id = c.`id` where p.discount > 0";
			$result = $this->conn->query($sql);

			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] =$row;

			}

			return $data;
		}
		function find_category($code){

			$sql ="SELECT * FROM products  where category_id ='".$code."'";

			$result = $this->conn->query($sql);
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] =$row;

			}
			return $data;
		} 





	}

?>