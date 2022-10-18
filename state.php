<?php
include("db_connect.php");
$errors = [];
$request = $_SERVER["REQUEST_METHOD"];
$allowed_request = ["GET", "POST", "PUT", "DELETE"];
if(isset($_POST['student_id']))
{
    //echo "hi";
  if(in_array($request,$allowed_request))
  {
    if($request == 'POST')
    {
      //echo "h2";
      $student_id = $_POST['student_id']; //Registered id of the student in the device
      $date = $_POST['date']; //Recorded date YYYY/MM/DD
      $time = $_POST['time']; //Recorded hours H:i:s
      $type = $_POST['type']; //type of traffic (entry/exit)
      $device_id = $_POST['device_id']; //Registered id of the device
      
      $sql = "INSERT INTO en_ex (student_id, date, time, type, device_id)
      VALUES ($student_id, '$date', '$time', $type, $device_id)";

      if ($conn->query($sql) === TRUE)
      {
        array_push($errors,"New record created successfully");
        $data = array(
          "success" => true,
          "http_code" => 200
        );
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    
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
