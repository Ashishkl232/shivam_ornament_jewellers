<section class="head">
	 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    	<?php
           $get_slider="select * from slider LIMIT 0,1";
           $slider_query=mysqli_query($ornament_connect,$get_slider);
           while ($fetch_slider=mysqli_fetch_assoc($slider_query)) {
          
           
    	?>
      <img class="d-block w-100" src="<?php echo 'admin/upload/'.$fetch_slider['image']?>" alt="">

  <?php }?>
    </div>
    
    	<?php
           $get_slider="select * from slider LIMIT 1,3";
           $slider_query=mysqli_query($ornament_connect,$get_slider);
           while ($fetch_slider=mysqli_fetch_assoc($slider_query)) {
             $slider=$fetch_slider['image'];
             
             echo"<div class='carousel-item'>
               <img class='d-block w-100' src=' admin/upload/$slider' alt=''>
               </div>

             ";
          } 
    	?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section>