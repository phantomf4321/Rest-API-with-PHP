<?php
include("db_connect.php");
$errors = [];
$request = $_SERVER["REQUEST_METHOD"];
$allowed_request = ["GET", "POST", "PUT", "DELETE"];
if(isset($_post['student_id']))
{
  if(in_array($request,$allowed_request)){
    
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
