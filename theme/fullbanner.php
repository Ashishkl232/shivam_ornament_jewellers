<?php

$banner="select * from shivam_seo LIMIT 0,1";
$mysqli=mysqli_query($ornament_connect,$banner);

?>

<section class="banner_fullwidth black_fullwidth">
	<?php
     while($row=mysqli_fetch_assoc($mysqli)){
       $title=$row['banner_title'];


	?>
	<img src="<?php echo 'admin/upload/'.$row['Meta_banner']?>">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				 <div class="banner_text">
					<div class="banner_text">
                 <p><?php echo substr($title, 0,18)?></p>
                   <h2><?php echo substr($title, 19,24)?></h2>
                     <span><?php echo substr($title,42,75)?>.</span>
                      <a href="#">Shop Now</a>
                     </div>
				</div>
			</div>
		</div>
	</div>
<?php }?>
</section>




<!---------product Carousal start-------->

<?php

$product="select * from product LIMIT 0,1";
$query=mysqli_query($ornament_connect,$product);

$row=mysqli_fetch_assoc($query);

?>
<div class="bestselling">
	 <h2><?php echo $row['best']?></h2>
	 <a target="_blank" href="gallery.php">See More</a>
</div>



<section class="productslider">
	<div class="container">
     <div class="row">
            <div class="owl-carousel owl-theme">
            	 <?php

          $productslider="select * from product  where status=1 order by date desc LIMIT 0,5";
    $productquery=mysqli_query($ornament_connect,$productslider);
    while($rowslider=mysqli_fetch_assoc($productquery)){
         ?>

    <div class="item"><img src="<?php echo 'admin/upload/'.$rowslider['product_image']?>"></div>
   <?php }?>
</div>
    
   

</div>

	</div>

</section>
	
	<script>
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
	</script>


<!---------product Carousal End----------->

<!----instagram Image Start--------->
<?php
  $seo="select wedding_title from shivam_seo LIMIT 0,1";
  $seoquery=mysqli_query($ornament_connect,$seo);
  $seorow=mysqli_fetch_assoc($seoquery);
?>
 <div class="category1">
	<div class="heading">
		<h2><?php echo $seorow['wedding_title']?></h2>
	</div>
</div>

<section class="Instagram">
	 <div class="container">
	 	
	 
	 <div class="row">
	 	 <?php  
          $instaimage="select instagram_image from shivam_seo LIMIT 1,5";
          $instaquery=mysqli_query($ornament_connect,$instaimage);
          while ($instarow=mysqli_fetch_assoc($instaquery)) {
         
	 	?>
	 	 <div class="Insta col-lg-2 col-md-3 col-12">
	 	 	<img src="<?php echo 'admin/upload/'.$instarow['instagram_image']?>">
	 	 </div>
	 	<?php }?> 
	 	  
	 </div>
	 </div>
</section>   
<!----instagram Image End--------->


