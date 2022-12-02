<title>مشاهده عملکرد دانش آموز</title>
<?php 
if (isset($_GET['name'])){
    

	?>
<style>
#customers {
  font-family:B Nazanin;
  border-collapse: collapse;
  width: 100%;
  text-align: center;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #1a8cff;
  color: white;
  text-align: center;
}
</style>
<h2 style="font-family: B Nazanin; text-align: center">مشاهده وضعیت 500 پارت اخیر شما</h2>
<table id="customers">

  <tr>
    <th>کد لیست</th>
    <th>کد دیتابیس</th>
    <th>وضعیت</th>
    <th>ثبت نهایی در سیستم</th>
    <th>ردیف</th>
  </tr>
<?php 
include("db_connect.php");
  
	$name=$_GET['name'];
    $sql = "SELECT * FROM attendance_record WHERE name='$name' ORDER BY id DESC LIMIT 500";
    $result = $conn->query($sql);
    $id=0;
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
			$id=$id+1;
			?>
			
			
  <tr>
    <td><?php  echo $row["attendance_id"] ?></td>
	<td><?php  echo $row["id"] ?></td>
    <?php  if($row['type']==1){?> <td style="color: green"><?php  echo "حاضر";} ?>
    <?php  if($row['type']==2){?> <td><?php  echo "تاخیر";}?>
    <?php  if($row['type']==0){?> <td style="color: red"><?php  echo "غایب";}?>
    <td><?php  echo $row["date_created"]?></td>
    <td><?php  echo $id?></td>
  </tr>
  
            <?php
        }
    }
}
	else
	{
		header("Location: panel.php");
     exit();
	}
?>

