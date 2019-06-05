<?php 
require_once('models/Connection.php');
require_once('models/Customer.php');
class Bill extends Model{
	var $conn;
	var $table_name='bills';
	var $primary_key='bill_code';
	function __construct(){
		$conn_obj= new Connection();
		$this->conn = $conn_obj->conn;
	}

	function All(){
		
		$sql = "SELECT b.* , c.name as customer_name, e.name as employee_name FROM bills b JOIN customers c JOIN employees e on b.customer_id = c.`id` and e.id = b.employee_id";
		
		$result = $this->conn->query($sql);
		
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] =$row;

		}

		return $data;
	}
	// function find($code){
		
	// 	$sql ="SELECT * FROM ".$this->table_name."  where ".$this->primary_key." ='".$code."'";
	// 	$data = $this->conn->query($sql)->fetch_assoc();
	// 	return $data;
	// } 
	function create($data){
		
		$query ="INSERT INTO bills(bill_code,customer_id,time_bill,employee_id) VALUES('".$data['bill_code']."','".$data['customer_id']."','".$data['time_bill']."','".$data['employee_id']."')";
		// die($query);		
		$result = $this->conn->query($query);

		return $result;
	}
	function update($data){	
		$query ="UPDATE bills SET total_money ='".$data['total_money']."', statuss='".$data['statuss']."'  WHERE bill_code ='".$data['bill_code']."'";
		$status = $this->conn->query($query);
		return $status;
	}
	function update_online($data){	
		$query ="UPDATE bills SET statuss='".$data['statuss']."'  WHERE bill_code ='".$data['bill_code']."'";
		
		$status = $this->conn->query($query);
		return $status;
	}
	function Month($data){
		$customer=new Customer();
		$sql = "SELECT * FROM bills WHERE time_bill like '".$data['nam']."-".$data['thang']."-% %:%:%'";
		// die($sql);
		$result = $this->conn->query($sql);
		
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] =$row;
			foreach ($data as $key => $value) {
				$customer_name=$customer->find($value['customer_id']);
				$data[$key]['customer_name']=$customer_name['name'];
			}

		}

		return $data;
	}
}
?>