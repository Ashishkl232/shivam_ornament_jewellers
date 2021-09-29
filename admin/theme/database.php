<?php
 date_default_timezone_set('Asia/Kolkata');
 $con= new mysqli('localhost','root','','shivam_ornament');
  session_start();
 
if ($con) {
    
    echo "<script> alert('yes');</script>";

}else{
    echo "<script> alert('no');</script>";
}

?>