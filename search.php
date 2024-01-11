<?php
require_once ('process/dbh.php');
if(isset($_POST["query"])){
    $output='';
    $query="SELECT * FROM `employee` WHERE id LIKE '%".$_POST["query"]."%'";
    $result = mysqli_query($conn, $query);
    $output='<ul class="list-unstyled">';
    if(mysqli_num_rows($result) > 0){
        while($row =mysqli_fetch_array($result))
        {
            $output.= '<li>'.$row['id'].'-'.$row['firstName'].' '.$row['lastName'].'-'.$row['skills'].'</li>';
        }
    }
    else{
        $output='<li>Employee not found</li>';
    }
    $output .= '</ul>';
    echo $output;

} 


?>