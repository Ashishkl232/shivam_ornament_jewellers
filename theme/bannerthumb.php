 <section class="banner_section banner_black">
            <div class="container">
                <div class="row">
                    <?php   
                      $get_banner="select * from slider";
                      $banner_query=mysqli_query($ornament_connect,$get_banner);
                      while ($row=mysqli_fetch_assoc($banner_query)) {
                        $title=$row['title'];
                      
                    ?>
                    <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 d-block">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="#"><img src="<?php echo 'admin/upload/'.$row['image2']?>" alt="banner1"></a>
                                <div class="banner_content">
                                    <p><?php echo substr($title, 0,17)?></p>
                                    <h2><?php echo substr($title, 18,36)?></h2>
                                    <span><?php echo $row['heading']?></span>
                                </div>
                            </div>
                
                    </div>
                   
                    
                </div>
            <?php }?>
            </div>
        </section>