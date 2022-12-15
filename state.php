<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("X-Requested-With = XMLHttpRequest");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include("jdf.php");
    
    $errors = [];
    $request = $_SERVER["REQUEST_METHOD"];
    $allowed_request = ["GET", "POST", "PUT", "DELETE"];


if(isset($_GET['student_id']))
{
    $student_id = $_GET['student_id'];
    $name = $_GET['name'];
    $device_id = $_GET['device_id'];
    $time = $_GET['time'];
    $date = $_GET['date'];
    //$date = jdate("Y/m/d");
    
    if($device_id == 1){
        include("db_connect.php");
    }
    /*
    if($device_id == 2){
        include("db_connect2.php");
    }
    if($device_id == 3){
        include("db_connect3.php");
    }
    if($device_id == 4){
        include("db_connect4.php");
    }...
    
    */
    
    
    $sql2 = "SELECT * FROM en_ex WHERE student_id='$student_id' AND date='$date'";
    $result2 = $conn->query($sql2);
    $confirm = 1;
    if ($result2->num_rows > 0) {
        while($row2 = $result2->fetch_assoc()) {
            if($row2['time'] == $time)
            {
                $confirm = 0;
                break;
            }
        }
    }
    
    if($confirm == 1)
    {
        $sql = "INSERT INTO en_ex (student_id, device_id, date, time, name)VALUES ($student_id, $device_id, '$date', '$time', '$name')";
        if ($conn->query($sql) === TRUE) {
            array_push($errors,"Recorrd created successfuly!");
              $data = array(
                "success" => true,
                "http_code" => 200,
                "student_id" => $student_id,
                "device_id" => $device_id,
                "time" => $time,
                "date" => $date,
              );
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else{
        array_push($errors,"Warmed over! Repeated data...");
        $data = array(
            "success" => false,
            "http_code" => 400
        );
    }
}
else{
  array_push($errors,"'token' parameter is undefined!");
  $data = array(
    "success" => false,
    "http_code" => 400
  );
}
if(count($errors) != 0) $data['$errors'] = $errors;
echo json_encode($data);

?>
