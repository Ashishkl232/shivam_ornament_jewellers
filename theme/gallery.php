<section class="product">
  <div class="container">
    <div class='text'>
        <?php
           $title="select best from product where id=13 ";

           $titlequery=mysqli_query($ornament_connect,$title);
           $fetch_title=mysqli_fetch_array($titlequery);
        ?>
      <h1 class='heading'><?php echo $fetch_title['best'] ?></h1>
           
        
          </div>
         <div class="row bor">
          <?php 
            $best_product ="select * from product where cate_id=21 and status=1 order by date desc LIMIT 0,8";
            $best_query=mysqli_query($ornament_connect,$best_product);
            while($row=mysqli_fetch_assoc($best_query)){
          ?>
          <div class="olp2 col-lg-3 col-md-4">
    <div class="item">
    <img src="<?php echo 'admin/upload/'.$row['product_image']?>">
       </div>
       
       </div>
         <?php }?> 
         </div>
        
       

</div>
</section>

<!---banner--->
<section class="head">
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php
           $get_slider="select wedding_image from shivam_seo LIMIT 0,1";
           $slider_query=mysqli_query($ornament_connect,$get_slider);
           while ($fetch_slider=mysqli_fetch_assoc($slider_query)) {
          
           
      ?>
      <img class="d-block imgbx" src="<?php echo 'admin/upload/'.$fetch_slider['wedding_image']?>" alt="">

  <?php }?>
    </div>
    
     
  </div>
  
  
</section>
  

<section class="product">
  <div class="container">
    <div class='text'>
        <?php
           $title="select best from product where id=18 ";

           $titlequery=mysqli_query($ornament_connect,$title);
           $fetch_title=mysqli_fetch_array($titlequery);
        ?>
      <h1 class='heading'><?php echo $fetch_title['best'] ?></h1>
           
        
          </div>
         <div class="row bor">
          <?php 
            $best_product ="select * from product where cate_id=22 and status=1 order by date desc LIMIT 0,8";
            $best_query=mysqli_query($ornament_connect,$best_product);
            while($row=mysqli_fetch_assoc($best_query)){
          ?>
          <div class="olp2 col-lg-3 col-md-4">
    <div class="item">
    <img src="<?php echo 'admin/upload/'.$row['product_image']?>">
       </div>
       
       </div>
         <?php }?> 
         </div>
        
       

</div>
</section>


<section class="product">
  <div class="container">
    <div class='text'>
        <?php
           $title="select best from product where id=16 ";

           $titlequery=mysqli_query($ornament_connect,$title);
           $fetch_title=mysqli_fetch_array($titlequery);
        ?>
      <h1 class='heading'><?php echo $fetch_title['best'] ?></h1>
           
        
          </div>
         <div class="row bor">
          <?php 
            $best_product ="select * from product where cate_id=15 and status=1 order by date desc LIMIT 0,8";
            $best_query=mysqli_query($ornament_connect,$best_product);
            while($row=mysqli_fetch_assoc($best_query)){
          ?>
          <div class="olp2 col-lg-3 col-md-4">
    <div class="item">
    <img src="<?php echo 'admin/upload/'.$row['product_image']?>">
       </div>
       
       </div>
         <?php }?> 
         </div>
        
       

</div>
</section>


<section class="product">
  <div class="container">
    <div class='text'>
        <?php
           $title="select best from product where id=32 ";

           $titlequery=mysqli_query($ornament_connect,$title);
           $fetch_title=mysqli_fetch_array($titlequery);
        ?>
      <h1 class='heading'><?php echo $fetch_title['best'] ?></h1>
           
        
          </div>
         <div class="row bor">
          <?php 
            $best_product ="select * from product where cate_id=25 and status=1 order by date desc LIMIT 0,8";
            $best_query=mysqli_query($ornament_connect,$best_product);
            while($row=mysqli_fetch_assoc($best_query)){
          ?>
          <div class="olp2 col-lg-3 col-md-4">
    <div class="item">
    <img src="<?php echo 'admin/upload/'.$row['product_image']?>">
       </div>
       
       </div>
         <?php }?> 
         </div>
        
       

</div>
</section>


<section class="product">
  <div class="container">
    <div class='text'>
        <?php
           $title="select best from product where id=14 ";

           $titlequery=mysqli_query($ornament_connect,$title);
           $fetch_title=mysqli_fetch_array($titlequery);
        ?>
      <h1 class='heading'><?php echo $fetch_title['best'] ?></h1>
           
        
          </div>
         <div class="row bor">
          <?php 
            $best_product ="select * from product where cate_id=17 and status=1 order by date desc LIMIT 0,8";
            $best_query=mysqli_query($ornament_connect,$best_product);
            while($row=mysqli_fetch_assoc($best_query)){
          ?>
          <div class="olp2 col-lg-3 col-md-4">
    <div class="item">
    <img src="<?php echo 'admin/upload/'.$row['product_image']?>">
       </div>
       
       </div>
         <?php }?> 
         </div>
        
       

</div>
</section>
