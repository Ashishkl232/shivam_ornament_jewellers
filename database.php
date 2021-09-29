<?php
date_default_timezone_set('Asia/Kolkata');
$ornament_server="localhost";

$ornament_username="root";

$ornament_password="";

$ornament_database="shivam_ornament";


$ornament_connect=new mysqli($ornament_server,$ornament_username,$ornament_password,$ornament_database);

if($ornament_connect) {
    
    echo"<script> alert('database connection Successfull')</script>";
}else{
	 echo"<script> alert('database connection failed')<script>";
}










?>