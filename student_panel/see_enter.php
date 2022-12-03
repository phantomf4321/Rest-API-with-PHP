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
<table id="customers">

  <tr>
    <th>ساعت</th>
    <th>روز</th>
    <th>ردیف</th>
  </tr>
<?php 
include("db_connect.php");
  
	$name=$_GET['name'];
    $sql = "SELECT * FROM enter WHERE name='$name' ORDER BY id DESC";
    $result = $conn->query($sql);
    $id=0;
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
			$id=$id+1;
			?>
			
			
  <tr>
	<td><?php  echo $row["time"] ?></td>
    <td><?php  echo $row["day"]?></td>
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

