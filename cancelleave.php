<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id = $_POST['emp_id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM employee_leave WHERE id=$id and status='Pending' ");

//redirecting to the display page (index.php in our case)
header("Location:applyleave.php");
?>