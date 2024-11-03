<?php

header('Content-Type: Application/json');
header('Access-Control-Allow_Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers , Access-Control-Allow-Methods , Content-Type, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"),true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

include 'conn.php';

$sql = "UPDATE students SET student_name = '{$name}', age={$age}, city = '{$city}' WHERE id = {$id} ";

if(mysqli_query($conn,$sql)){
	echo json_encode(array('message'=>"Successfuly  update data",'status'=>true ));
}else{
		echo json_encode(array('message'=>"Failed to  update data",'status'=>false ));
}



?>