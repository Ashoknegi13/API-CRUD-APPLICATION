<?php

header('Content-Type: application/json');
header('Access-Control-Allow_Origin: *');

 include 'conn.php';

$sql = "SELECT * FROM students  ";
$result = mysqli_query($conn,$sql) or die('Query failed');

if(mysqli_num_rows($result)>0){

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output,JSON_PRETTY_PRINT);

}else{
	echo json_encode(array('message' => 'no record found' , 'status' => false));
}
?>