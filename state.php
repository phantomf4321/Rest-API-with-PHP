<?php
include("db_connect.php");
$errors = [];
$request = $_SERVER["REQUEST_METHOD"];
$allowed_request = ["GET", "POST", "PUT", "DELETE"];
if(isset($_post['student_id']))
{
  if(in_array($request,$allowed_request)){
    if($request == 'POST')
    {
      $student_id = $_POST['student_id']; //Registered id of the student in the device
      $date = $_POST['date']; //Recorded date YYYY/MM/DD
      $time = $_POST['time']; //Recorded hours H:i:s
      $type = $_POST['type']; //type of traffic (entry/exit)
    }
    
  }else
    array_push($errors,"'your http request is ilegal!");
    $data = array(
      "success" => false,
      "http_code" => 400
    );
  }
  
}
else{
  array_push($errors,"'student_id' parameter is undefined!");
  $data = array(
    "success" => false,
    "http_code" => 400
  );
}
if(count($errors) != 0) $data['$errors'] = $errors;
echo json_encode($data);
?>
