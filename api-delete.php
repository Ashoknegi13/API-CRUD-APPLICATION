<?php
	header('Content-Type: Application/json');
	header('Access-Control-Allow_Origin: *');
	header('Access-Control-Allow-Methods: DELETE');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers , Content-Type,  Access-Control-Allow-Methods, Authorization, X-Requested-With');

	$data = json_decode(file_get_contents("php://input"),true);

	$id = $data['sid'];

	include'conn.php';

	$sql = "DELETE FROM students WHERE id = {$id}";

	if(mysqli_query($conn,$sql)){
			echo json_encode(array('message' => 'Delete Success' , 'status' => true));

	}else{
			echo json_encode(array('message' => 'Failed' , 'status' => false));
	}

?>