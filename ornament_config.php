<?php
date_default_timezone_set('Asia/Kolkata');
$ornament_server="localhost";

$ornament_username="root";

$ornament_password="";

$ornament_database="shivam_ornament";


$ornament_connect=new mysqli($ornament_server,$ornament_username,$ornament_password,$ornament_database);


function pr($arr){
    echo"<pre>";
    print_r($arr);
 }


 function prx ($arr){
     echo "<pre>";
     print_r($arr);
     die();
 }

 function get_safe_value($ornament_connect,$str){
      if ($str!='') {
        $str=trim($str);
        return strip_tags(mysqli_real_escape_string($ornament_connect,$str));
      }
 }

function gettitle(){
	global $ornament_connect;
  
   $get_logo="select Site_logo from yogesh_profile_dashboard";
   $get_query=mysqli_query($ornament_connect,$get_logo);
    
    while ($fetch_title=mysqli_fetch_array($get_query)) {
    	$site_title=$fetch_title['Site_logo'];
        $site_logo=$fetch_title['Site_logo'];

    	echo "<title>$site_title</title>";

        

    }
}
function getlogo(){
    global $ornament_connect;
  
   $get_logo="select Site_logo from yogesh_profile_dashboard";
   $get_query=mysqli_query($ornament_connect,$get_logo);
    
    while ($fetch_title=mysqli_fetch_array($get_query)) {
        $site_logo=$fetch_title['Site_logo'];

        echo "<a class='navbar-brand log' href='index.php' >$site_logo</a>";

}

}

function getcate(){
    global $ornament_connect;
    $get_categroy="select * from categories where status=1";
    $category_query=mysqli_query($ornament_connect,$get_categroy);
    while ($row=mysqli_fetch_assoc($category_query)) {
         
          $cate_id=$row['id'];
          $cate_name=$row['categories'];
          $cate_img=$row['category_img'];

          echo"<div class='imgbox col-lg-3 col-md-3'>
             <img src='admin/upload/$cate_img'>
       <a  type='button' href='product/$cate_id'>$cate_name</a>
         </div>";

    }
}

function getprocate(){
    global $ornament_connect;
 if (isset($_GET['p_id'])) {
     $p_cate_id=mysqli_real_escape_string($ornament_connect,$_GET['p_id']);
     $get_p_cate="select * from categories where id='$p_cate_id'";
     $run_p_cate=mysqli_query($ornament_connect,$get_p_cate);
     $row_p_cate=mysqli_fetch_assoc($run_p_cate);
     $p_cate_title=$row_p_cate['categories'];

     $get_product="select * from product where cate_id='$p_cate_id'";
     $product_query=mysqli_query($ornament_connect,$get_product);

     $count=mysqli_num_rows($product_query);
     

     while ($row_product=mysqli_fetch_assoc($product_query)) {
           
           $product_image=$row_product['product_image'];

           echo"
            
               <div class=' imgbox1 col-lg-3 col-md-3 col-sm-6'>
                 <img src='admin/upload/$product_image' class='img-responsive'>

                </div>
              
             
             

           ";
     }
 }
   
    
}


/********demo*********/

function getprtitle(){
    global $ornament_connect;
 if (isset($_GET['p_id'])) {
     $p_cate_id=mysqli_real_escape_string($ornament_connect,$_GET['p_id']);
     $get_p_cate="select * from categories where id='$p_cate_id'";
     $run_p_cate=mysqli_query($ornament_connect,$get_p_cate);
     $row_p_cate=mysqli_fetch_assoc($run_p_cate);
     $p_cate_title=$row_p_cate['categories'];

     $get_product="select * from product where cate_id='$p_cate_id'";
     $product_query=mysqli_query($ornament_connect,$get_product);

     $count=mysqli_num_rows($product_query);
     if ($count==0) {
         echo"
         <div class='text'>
                <h1 class='heading'>Product Not Found</h1>
            </div>
    ";
     }else{
        echo"
             
         <div class='text'>
                <h1 class='heading'>$p_cate_title</h1>
            </div>
        
           ";
     }


     }
 }


     

?>