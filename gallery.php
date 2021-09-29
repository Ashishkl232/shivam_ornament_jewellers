<?php
require('database.php');
require('ornament_config.php');



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php
      gettitle();
	?>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<?php require('link/link.php')?>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body class="text-light">

  <!--Top Bar Start-->
<?php require('theme/topbar.php')?>
 <!--Top Bar  End-->
   <!--Nav Start-->
<?php require('theme/nav.php')?>
 <!--Nav  End-->
<!---------header Section Start--------->
      <?php require('theme/header.php');?>
<!---------header Section end--------->

<!---------header Section Start--------->
      <?php require('theme/gallery.php');?>
<!---------header Section end--------->



<!----------Footer Start-------->

 <?php require('theme/footer.php');?>
<!----------Footer End --------->


<?php require('link/script.php')?>


<?php require('contact.php')?>