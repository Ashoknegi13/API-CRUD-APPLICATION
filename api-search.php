<?php
header('Content-Type: Application/json');
header('Access-Control-Allow-Origin: *');
 


// this methode for manuelly write the name in apidog body raw using POST  
// $data = json_decode(file_get_contents('php://input'),true);

// $search_term = $data['search'];


// this methode for afte url write the name of search term  using GET methode in apidog 

$search_term = isset($_GET['search'])? $_GET['search'] : die() ; 

include'conn.php';

$sql = "SELECT * FROM students WHERE  student_name LIKE '%{$search_term}%'   ";

$result = mysqli_query($conn,$sql) or die("Query failed");

if(mysqli_num_rows($result)>0 ){
	$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output,JSON_PRETTY_PRINT);
}else{
	echo json_encode(array('message' => 'user not found' , 'status' => false));
}
?>