<?php

$profile="select * from yogesh_profile_dashboard";
$prosql=mysqli_query($ornament_connect,$profile);
$getarr=array();

while ($profierow=mysqli_fetch_assoc($prosql)) {
       $getarr[]=$profierow;
}

?>
  <div id="topbar"><!---#top Bar Start--->
         <div class="container">
             <div class="row align-items-center">
                 <?php
                  foreach ($getarr as $list) {
                   
                  

                 ?>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="social-icon">
                              <ul>
                                
                                    <li><a href="<?= $list['showroom_faceboook'] ?>"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="mailto:<?= $list['showroom_email'] ?>"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="<?= $list['showroom_instagram'] ?>"><i class="ion-social-instagram"></i></a></li>
                                     <li><a href=" https://wa.me/91123456789" target="_blank"><i class="ion-social-whatsapp"></i></a></li>

                                
                                </ul>
                          </div>
                  </div>

                   <div class="col-lg-6 col-md-6 col-sm-6">

                                <div class="home_contact">
                                <div class="contact_icone">
                                    <img src="images/icon/icon_phone.png" alt="">
                                </div>
                                <div class="contact_box">
                                    <p>Inquiry / Helpline : +91<a href="tel:<?= $list['showroom_mobile'] ?>"><?php echo $list['showroom_mobile']?></a></p>
                                </div>
                            </div>
                          </div>
                          <?php }?>
                  </div>
             </div>
     </div><!---#topBar Rnd---->