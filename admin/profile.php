<?php

require('theme/database.php');
require('theme/function.inc.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}

$sql="select * from  yogesh_profile_dashboard";

$res=mysqli_query($con,$sql);


?>


<?php require ('link/csslink.php')?>

<div class="wrapper">

  <!-- Navbar -->
    <?php require ('theme/nav.php')?>
  <!-- /.navbar -->
     <?php require ('theme/sidebar.php')?>
  <!-- Main Sidebar Container -->
   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php 
      while ($row=mysqli_fetch_assoc($res)) {
                      
                     
      ?>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1 class="m-0 text-bold" >Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <?php
                 echo"<span class='edit'><a href='editprofile.php?id=".$row['id']."'>EDIT</a></span>"
                 ?>
              </li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <section class="content">
      
      <div class="container-fluid">
        <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Profile</h3>
        </div>
        <!-- SELECT2 EXAMPLE -->
        
          
        <div class="row">
         
          <div class="col-md-6">

            
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Site Logo</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-image"></i></span>
                    </div>
                    <input type="text" class="form-control" name="logo" placeholder="Enter Site Logo Name" value="<?php echo  $row['Site_logo']?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                <div class="form-group">
                   <label>Site Heading</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-file-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="heading" value="<?php echo  $row['Site_heading']?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Site Address</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-store"></i></span>
                    </div>
                    <input type="text" class="form-control"  name="add" placeholder="Enter Your Address" value="<?php echo  $row['showroom_address']?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Enter Your Email</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-envelope"></i></i></span>
                    </div>
                    <input type="email" class="form-control"
                           name="email" placeholder="email" value="<?php echo  $row['showroom_email']?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- IP mask -->
                
                <!-- /.form group -->

              </div>
              <!-- /.card-body -->
           
            <!-- /.card -->

            
            <!-- /.card -->

          </div>
          <div class="col-md-6">

            
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Mobile</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                    </div>
                    <input type="number" class="form-control" name="mobile" value="<?php echo  $row['showroom_mobile']?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                <div class="form-group">
                  <label>Facebook</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                    </div>
                    <input type="text" class="form-control" name="facebook" value="<?php echo  $row['showroom_faceboook']?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Instagram</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                    </div>
                    <input type="text" class="form-control" name="instagram" value="<?php echo  $row['showroom_instagram']?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Social Heading</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-users"></i></span>
                    </div>
                    <input type="text" class="form-control"
                          name="social" value="<?php echo  $row['social_heading']?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- IP mask -->
                
                <!-- /.form group -->

              </div>
              <!-- /.card-body -->
          
            <!-- /.card -->

            
            <!-- /.card -->

          </div>
          <!-- /.col (left) -->
          
          <!-- /.col (right) -->
            

           </div>
           
    
        <!-- /.row -->
        
        <!-- /.row -->
        
        <!-- /.row -->
       

      </div>
    </div>
      <!-- /.container-fluid -->
    </section>
    </div>
      </div><!-- /.container-fluid -->

<?php }?> 
    </div>

   
    <!-- /.content-header -->

    <!-- Main content -->
  
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
   <?php require('theme/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
