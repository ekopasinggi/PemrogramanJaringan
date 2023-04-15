<?php
require_once "koneksi.php";
class Student 
{

	public  function get_students(){
		global $mysqli;
		$query="SELECT * FROM student";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
			'status' => 1,
			'message' =>'Get List Student Successfully.',
			'data' => $data
		);
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function get_student($nim){
		global $mysqli;
		$query="SELECT * FROM student WHERE nim=".$nim;
		
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get Student Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
		 
	}

	public function insert_student()
		{
			global $mysqli;
			
			$data = json_decode(file_get_contents("php://input"), true);

			$arrcheckpost = array('nim' => '', 'name' => '', 'gender' => '', 'address' => '');
			
			$hitung = count(array_intersect_key($data, $arrcheckpost));
			
			if($hitung == count($arrcheckpost)){
			
					$result = mysqli_query($mysqli, "INSERT INTO student SET
					nim = '$data[nim]',
					name = '$data[name]',
					gender = '$data[gender]',
					address = '$data[address]'");
					
					if($result)
					{
						$response=array(
							'status' => 1,
							'message' =>'Student Added Successfully.'
						);
					}
					else
					{
						$response=array(
							'status' => 0,
							'message' =>'Student Addition Failed.'
						);
					}
			}else{
				$response=array(
							'status' => 0,
							'message' =>'Parameter Do Not Match' 
						);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}

	function update_student($nim)
		{
			global $mysqli;

			$data = json_decode(file_get_contents("php://input"), true);

			$arrcheckpost = array('name' => '', 'gender' => '', 'address' => '');
			$hitung = count(array_intersect_key($data, $arrcheckpost));
			if($hitung == count($arrcheckpost)){
			
		        $result = mysqli_query($mysqli, "UPDATE student SET
					name = '$data[name]',
					gender = '$data[gender]',
                    address = '$data[address]'
		            WHERE nim='$nim'");
		   
				if($result)
				{
					$response=array(
						'status' => 1,
						'message' =>'Student Updated Successfully.'
					);
				}
				else
				{
					$response=array(
						'status' => 0,
						'message' =>'Student Updation Failed.'
					);
				}
			}else{
				$response=array(
							'status' => 0,
							'message' =>'Parameter Do Not Match',
						);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}

	function delete_student($nim){
		global $mysqli;
		$query="DELETE FROM student WHERE nim=".$nim;
		if(mysqli_query($mysqli, $query))
		{
			$response=array(
				'status' => 1,
				'message' =>'Student Deleted Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'message' =>'Student Deletion Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

 ?>