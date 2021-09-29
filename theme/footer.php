<?php
$profile="select * from yogesh_profile_dashboard";
$prosql=mysqli_query($ornament_connect,$profile);
$getarr=array();

while ($profierow=mysqli_fetch_assoc($prosql)) {
       $getarr[]=$profierow;
}
?>
 <!-- footer section starts -->
        <footer class="footer_widgets footer_black">
            <div class="container">
                <div class="footer_top">
                    <div class="row">
                       <?php
                  foreach ($getarr as $list) {
                   
                  

                 ?>
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="widgets_container contact_us">
                                <h3><?php echo $list['Site_heading']?></h3>
                                <div class="footer_contact">
                                    <p><?php echo $list['showroom_address']?> </p>
                                    <p>Phone : +91<a href="tel:<?= $list['showroom_mobile'] ?>"><?php echo $list['showroom_mobile']?></a></p>
                                    
                                    <p>Email : <?php  echo $list['showroom_email']?></p>
                                     </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-4 col-6">
                            <div class="widgets_container widget_menu">
                                <h3><?php echo $list['social_heading']?></h3>
                                <div class="social-contact">
                                <ul>
                                        <li><a href="<?= $list['showroom_faceboook'] ?>"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="<?= $list['showroom_instagram'] ?>"><i class="ion-social-instagram"></i></a></li>
                                        <li><a href="mailto:<?= $list['showroom_email'] ?>"><i class="ion-social-googleplus"></i></a></li>
                                        
                                    </ul>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-5 col-6">
                            <div class="widgets_container widget_menu">
                                <h3> GOlD Silver Price rate</h3>
                                <table class="table  price">
                                	 <thead>
                                	 	  <tr>
                                	 	  	<th scope="col" >GOLD</th>
                                	 	  	<th scope="col">Silver</th>
                                	 	  </tr>
                                	 </thead>
                                	   <tbody>
                                	   	  <tr>
                                	   	  	 <td scope="row">INR:₹49,800</td>
                                	   	  	 <td>INR:₹63,600</td>
                                	   	  </tr>
                                	   </tbody>
                                </table>

                        </div>
                        <!---->
                        </div>
                    <?php }?>
                    </div>
                </div>
                <div class="footer_bottom">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright_area">
                                <p>Copyright &copy; <?php echo date('Y');?> <a href="#">Shivam Ornament</a> All rights Reserved.</p>
                               <!-- <img src="images/icon/papyel2.png" alt="">-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </footer>
</section>