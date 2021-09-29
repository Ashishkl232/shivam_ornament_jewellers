<?php
require('theme/database.php');
require('theme/function.inc.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}
 /*error_reporting(0);*/
 
  
     $head='';
     $logo='';
     $add='';
     $email='';
     $mobile='';
     $facebook='';
     $instagram='';
     $social='';
   $msg='';

 if (isset($_GET['id']) && $_GET['id']!='') {
     $image_required='';
    $id=get_safe_value($con,$_GET['id']);
    $query=mysqli_query($con,"select * from yogesh_profile_dashboard where id='$id'");
    $count= mysqli_num_rows($query);
    if ($count>0) {
      $row=mysqli_fetch_assoc($query);
     $head=$row['Site_heading'];
     $logo=$row['Site_logo'];
     $add=$row['showroom_address'];
     $email=$row['showroom_email'];
     $mobile=$row['showroom_mobile'];
     $facebook=$row['showroom_faceboook'];
     $instagram=$row['showroom_instagram'];
     $social=$row['social_heading'];

    }else{
         header('location:profile.php');
         die();
    }
 }

if(isset($_POST['submit'])) {
   $logo=get_safe_value($con,$_POST['logo']);
   $head=get_safe_value($con,$_POST['heading']);
   $add=get_safe_value($con,$_POST['add']);
   $email=get_safe_value($con,$_POST['email']);
   $mobile=get_safe_value($con,$_POST['mobile']);
   $facebook=get_safe_value($con,$_POST['facebook']);
   $instagram=get_safe_value($con,$_POST['instagram']);
   $social=get_safe_value($con,$_POST['social']);

    $sql=mysqli_query($con,"select * from yogesh_profile_dashboard where showroom_email='$email'");
    $res=mysqli_num_rows($sql);
    if ($res>0) {
      if (isset($_GET['id']) && $_GET['id']!='') {
          $get=mysqli_fetch_assoc($sql);
          if ($id==$get['id']) {
            
          }else{
             $error="heading already exist";
          }
      }else{
          $error="heading already exist";

      }
    }

  
  
   if ($msg=='') {
      if(isset($_GET['id']) && $_GET['id']!='') {
            
         $update="update yogesh_profile_dashboard set Site_logo='$logo',Site_heading='$head',showroom_address='$add',showroom_email='$email',showroom_mobile='$mobile',showroom_faceboook='$facebook',showroom_instagram='$instagram', social_heading='$social' where id='$id'";
         mysqli_query($con,$update);
      }else{
      
      $insert=mysqli_query($con,"insert into yogesh_profile_dashboard(Site_logo,Site_heading,showroom_address,showroom_email,showroom_mobile,showroom_faceboook,showroom_instagram,social_heading,status) values('$logo','$head','$add','$email','$mobile','$facebook','$instagram','$social',1) ");
      }
      header('location:profile.php');
      die();
   }
   
}

?>

<?php require('link/csslink.php')?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
   <?php require ('theme/nav.php')?>
  <!-- /.navbar -->
 <?php require ('theme/sidebar.php')?>
  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Category</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      
      <div class="container-fluid">
        <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Input masks</h3>
        </div>
        <!-- SELECT2 EXAMPLE -->
         <form action="" method="post">
          
        <div class="row">
         
          <div class="col-md-6">

            
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Site Logo</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="logo" placeholder="Enter Site Logo Name" value="<?php echo  $logo?>">
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
                    <input type="text" class="form-control" name="heading" value="<?php echo $head?>">
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
                    <input type="text" class="form-control"  name="add" placeholder="Enter Your Address" value="<?php echo $add?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Enter Your Email</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control"
                           name="email" placeholder="email" value="<?php echo $email?>">
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
                    <input type="number" class="form-control" name="mobile" value="<?php echo $mobile?>">
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
                    <input type="text" class="form-control" name="facebook" value="<?php echo $facebook?>">
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
                    <input type="text" class="form-control" name="instagram" value="<?php echo $instagram?>">
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
                          name="social" value="<?php echo $social?>">
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
           <button type="submit" name="submit" class="btn btn-success update">Update</button>
      </form>
        <!-- /.row -->
        
        <!-- /.row -->
        
        <!-- /.row -->
        <span class="error"><?php echo $msg?></span>

      </div>
    </div>
      <!-- /.container-fluid -->
    </section>
</div>
  <!-- /.content-wrapper -->
  <?php require('theme/footer.php');?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
