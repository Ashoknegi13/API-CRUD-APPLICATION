 <?php

header('Content-Type: application/json');
header('Access-Control-Allow_Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:  Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// security restric purpose only we want only data through ajax so that why we use --> X-Requested-With;


$data = json_decode(file_get_contents("php://input"),true);

 $name = $data['sname'];
 $age = $data['sage'];
$city = $data['scity'];
 
 include 'conn.php';

$sql = "INSERT INTO students(student_name,age,city)VALUES('{$name}',{$age},'{$city}') ";
// $result = mysqli_query($conn,$sql) or die('Query failed');

if(mysqli_query($conn,$sql)){

 
echo json_encode(array('message' => 'Student record Inserted' , 'status' => true));

}else{
	echo json_encode(array('message' => 'no record Insert' , 'status' => false));
}
?>