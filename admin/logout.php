<?php
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}
 session_start();
 unset($_SESSION['email']);
 session_destroy();
 header('location:login');
 die();

?>