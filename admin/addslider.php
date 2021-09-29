<?php
require('theme/database.php');
require('theme/function.inc.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}

 /*error_reporting(0);*/
  $title='';
  $head='';
 $image='';
 $image2='';
 $image3='';

 $msg='';
 
 $image_required='required';
 if (isset($_GET['id']) && $_GET['id']!='') {
     $image_required='';
    $id=get_safe_value($con,$_GET['id']);
    $query=mysqli_query($con,"select * from slider where id='$id'");
    $count= mysqli_num_rows($query);
    if ($count>0) {
      $row=mysqli_fetch_assoc($query);
      $title=$row['title'];
      $head=$row['heading'];

    }else{
         header('location:slider.php');
         die();
    }
 }

if(isset($_POST['submit'])) {
    $title = get_safe_value($con,$_POST['title']);
     $head = get_safe_value($con,$_POST['heading']);

    $sql=mysqli_query($con,"select * from slider where title='$title'");
    $res=mysqli_num_rows($sql);
    if ($res>0) {
      if (isset($_GET['id']) && $_GET['id']!='') {
          $get=mysqli_fetch_assoc($sql);
          if ($id==$get['id']) {
            
          }else{
             $msg="title already exist";
          }
      }else{
          $msg="title already exist";

      }
    }

  if($_GET['id']==0){
    if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
      $msg="Please select only png,jpg and jpeg image formate";
    }
  }else{
    if($_FILES['image']['type']!=''){
        if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
        $msg="Please select only png,jpg and jpeg image formate";
      }
    }
  }
  
  
   if ($msg=='') {
      if(isset($_GET['id']) && $_GET['id']!='') {

         if($_FILES['image']['name']!='') {
            $image=rand(111111,999999).'_'.$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);
      $image2=rand(111111,999999).'_'.$_FILES['image2']['name'];
      move_uploaded_file($_FILES['image2']['tmp_name'],'upload/'.$image2);
      $image3=rand(111111,999999).'_'.$_FILES['image3']['name'];
      move_uploaded_file($_FILES['image3']['tmp_name'],'upload/'.$image3);

       $upadte="update slider set title='$title',heading='$head',image='$image',image2='$image2',image3='$image3' where id='$id'";
        
         }else{
          $upadte="update slider set title='$title',heading='$head' where id='$id'";
         }
       
         mysqli_query($con,$upadte);
      }else{
      $image=rand(111111,999999).'_'.$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);

     $image2=rand(111111,999999).'_'.$_FILES['image2']['name'];
      move_uploaded_file($_FILES['image2']['tmp_name'],'upload/'.$image2);
      $image3=rand(111111,999999).'_'.$_FILES['image3']['name'];
      move_uploaded_file($_FILES['image3']['tmp_name'],'upload/'.$image3);

      $insert=mysqli_query($con,"insert into slider(title,heading,image,image2,image3,status) values('$title','$head','$image','$image2','$image3',1) ");
      }
      header('location:slider.php');
      die();
   }
   
}

?>


 
 <?php require ('link/csslink.php')?>


<!-- add slider ka code gallery.php me hai-->
<!----- add slider => gallery.php start----->
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
            <h1>Manage Slider</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryname">Title</label>
                    <input type="text" name="title" class="form-control" id="categoryname" placeholder="title" required value="<?php echo $title?>">
                  </div>
                  <div class="form-group">
                    <label for="categoryname">Heading</label>
                    <input type="text" name="heading" class="form-control" id="categoryname" placeholder="heading" required value="<?php echo $head?>">
                  </div>
                  <div class="form-group">
                    <label for="categoryimage">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image"class="custom-file-input" id="exampleInputFile" >
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="nav-icon far fa-image"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="categoryimage">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image2"class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="nav-icon far fa-image"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="categoryimage">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image3"class="custom-file-input" id="exampleInputFile" >
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="nav-icon far fa-image"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Add Slider</button>
                </div>
              </form>
              
              <span class="error"><?php echo $msg?></span>
              
            </div>
            <!-- /.card -->

            <!-- general form elements -->
        
            <!-- /.card -->

            <!-- Input addon -->
            
            <!-- /.card -->
            <!-- Horizontal Form -->
           
            <!-- /.card -->

          </div>
          <!---update---->
          
          <!---update end--->
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!----- add slider => gallery.php end----->  
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
