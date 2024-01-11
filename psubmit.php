<html>
<body>

<?php

session_start();
$eid= $_SESSION["id"];
require_once ('process/dbh.php');
//$id = (isset($_GET['id']) ? $_GET['id'] : '');
$pid = $_POST['pid'];
$id = $_POST['id'];

$files = $_FILES['file'];
$filename = $files['name'];
$filrerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('docs' , 'pdf');

if(in_array($filecheck, $fileextstored)){

    $destinationfile = 'files/'.$filename;
    move_uploaded_file($filetemp, $destinationfile);
    
    $date = date('Y-m-d');
    //echo "$date";
    $sql = "UPDATE `project` SET `subdate`='$date',`submitedfile`='$destinationfile' , `status`='Submitted' WHERE pid = '$pid' and eid='$eid';";
    $result = mysqli_query($conn , $sql);
    header("Location: empproject.php?id=$id");
    }
?>

</body>
</html>
  