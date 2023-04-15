<?php
require_once "method.php";
$std = new Student();

$request_method=$_SERVER["REQUEST_METHOD"];


switch ($request_method) {
	case 'GET':
			if(!empty($_GET["nim"]))    
			{
				$nim=intval($_GET["nim"]);
				$std->get_student($nim);
			}
			else
			{
				$std->get_students();
			}
			break;
	case 'POST':
			$std->insert_student();
			break;
	case 'PUT':
			$nim=intval($_GET["nim"]);
			$std->update_student($nim);		
			break;
	case 'DELETE':
		    $nim=intval($_GET["nim"]);
            $std->delete_student($nim);
            break;
	default:
		// Invalid Request Method
			header("HTTP/1.1 405 Method Not Allowed");
			break;
		break;
}

?>