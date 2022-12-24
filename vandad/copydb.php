<?php
    include("db_connect.php");
    include("jdf.php");
    
    $sql2 = "SELECT * FROM en_ex";
    $result2 = $conn->query($sql2);
    $counter = 0;
    $confirm = 3;
    if ($result2->num_rows > 0) {
        while($row2 = $result2->fetch_assoc()) {
            $id = $row2['student_id'];
            $table_id = $row2['id'];
            $date = $row2['date'];
            $time = $row2['time'];
            
            $sql = "INSERT INTO enter (time, day, student_id)VALUES ('$time', '$date', $id)";
            if ($conn->query($sql) === TRUE) {
                $sql3 = "DELETE FROM en_ex WHERE id=$table_id";
                if ($conn->query($sql3) === TRUE) {
                  echo "Record deleted successfully";
                } else {
                  echo "Error deleting record: " . $conn->error;
                }
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
        }
    }
?>
