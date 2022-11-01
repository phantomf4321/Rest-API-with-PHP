<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("X-Requested-With = XMLHttpRequest");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include("db_connect.php");
    include("jdf.php");
    $errors = [];
    $request = $_SERVER["REQUEST_METHOD"];
    $allowed_request = ["GET", "POST", "PUT", "DELETE"];


if(isset($_GET['token']))
{
    $student_id = $_GET['token'];
    $time = jdate("H:i:s");
    $date = jdate("Y/m/d");
    $device_id = 0;
    $type = 0;
    $confirm = 1;
    if($confirm == 1){
        if(in_array($request,$allowed_request)){
           if($request == 'GET'){
               //othing yet...
               //echo "hello";
               //echo $_GET['user_id'];
    
           } 
           if($request == 'POST'){
               //othing yet...
               //echo "hi";
               //echo $_GET['token'];
               //echo $_POST['user_id'];
               $sql2 = "INSERT INTO en_ex (student_id, device_id, date, time, type, name)VALUES ($student_id, $device_id, '$date', '$time', '$type', '$name')";
                
                if ($conn->query($sql2) === TRUE) {
                    array_push($errors,"Recorrd created successfully!");
                    $data = array(
                    "success" => true,
                    "http_code" => 200,
                    "user_id" => $student_id,
                    "time" => "$time",
                    "date" => "$date"
                    );
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
           } 
        }
        else{
            array_push($errors,"our request is illegal!");
            $data = array(
            "success" => false,
            "http_code" => 400
            );
        } 
    }
    else{
        array_push($errors,"there is no student with this id!");
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
