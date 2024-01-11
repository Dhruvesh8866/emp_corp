<?php

require_once ('dbh.php');

$pname = $_POST['pname'];
$eid = $_POST['eid'];

$subdate = $_POST['duedate'];
$pdesc = $_POST['pdesc'];
//$emp_id=$_POST['txtempid'];
$emp_role=$_POST['txtemprole'];
//$assignedfile= $_POST['assignedfile'];

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
    
    $last_pid_qResult=mysqli_query($conn,"SELECT max(pid) FROM project;");
    if ($last_pid_qResult->num_rows > 0) {
        foreach($last_pid_qResult->fetch_assoc() as $last_pid_col => $last_pid){
          $last_pid=$last_pid+1;  
          foreach($eid as $key => $value){
              $sql = "INSERT INTO `project`(`pid`,`eid`,`emp_role`, `pname`,`pdesc`, `assignedfile`, `duedate` , `status`) VALUES ('$last_pid','$eid[$key]' ,'$emp_role[$key]', '$pname' , '$pdesc', '$destinationfile' , '$subdate' , 'Due')";
              $result = mysqli_query($conn, $sql);
          }
        }
      }
//$sql = "INSERT INTO `project`(`eid`, `pname`,`pdesc`, `assignedfile`, `duedate` , `status`) VALUES ('$eid' , '$pname' , '$pdesc', '$destinationfile' , '$subdate' , 'Due')";

//$result = mysqli_query($conn, $sql);


if(($result) == 1){
    
    
    header("Location: ..//assignproject.php");
}
}
else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('File format not supported')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}




?>