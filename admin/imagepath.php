<?php
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/shivam/');
define('SITE_PATH','http://127.0.0.1/shivam/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/upload/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/upload/');



?>