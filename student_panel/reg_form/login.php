<?php 
session_start(); 
include("db_connect.php");


if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login_form.php?error=نام كاربري خود را وارد كنيد");
	    exit();
	}else if(empty($pass)){
        header("Location: login_form.php?error=رمز عبور را وارد كنيد");
	    exit();
	}else{
		$sql = "SELECT * FROM students WHERE id_no='$uname' AND mobile_phone='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['id_no'] === $uname && $row['mobile_phone'] === $pass) {
                $_SESSION['id'] = $row['id'];
            	$_SESSION['id_no'] = $row['id_no'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['mobile_phone'] = $row['mobile_phone'];
            	$_SESSION['ex_h'] = $row['ex_h'];
            	
            	header("Location: https://betavers.ir/hn3_student/panel.php");
		        exit();
            }else{
                echo "hahahah";
				//header("Location: login_form.php?error=1ارد شده است");
		        exit();
			}
		}else{
			header("Location: login_form.php?error=رمز عبور يا نام كاربري اشتباه وارد شده است");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}