<?php
require('theme/database.php');
require('theme/function.inc.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}
 /*error_reporting(0);*/
 
 $image='';
 $meta_banner='';
 $weddingimg='';
 $insta='';
 $meta_title='';
 $meta_desc='';
 $meta_keyword='';
 $banner_title='';
 $wedding_title='';
 


 $msg='';

 $image_required='required';
 if(isset($_GET['id']) && $_GET['id']!=''){
     $image_required='';
     $id=get_safe_value($con,$_GET['id']);
     $res=mysqli_query($con,"select * from shivam_seo where id='$id'");
     $count=mysqli_num_rows($res);
     if ($count>0) {
         $row=mysqli_fetch_assoc($res);
         $meta_title=$row['Meta_title'];
         $meta_desc=$row['meta_description'];
         $meta_keyword=$row['meta_keyword'];
         $banner_title=$row['banner_title'];
         $wedding_title=$row['wedding_title'];
         

     }else{
         header('location:seo.php');
         die();
     }
 }

 if(isset($_POST['submit'])){
      $meta_title=get_safe_value($con,$_POST['metatitle']);
      $wedding_title=get_safe_value($con,$_POST['wedding_title']);
      $banner_title=get_safe_value($con,$_POST['metabanner']);
      $meta_desc=get_safe_value($con,$_POST['metadesc']);
      $meta_keyword=get_safe_value($con,$_POST['metakeyword']);
      $sql=mysqli_query($con,"select * from shivam_seo where Meta_title='$meta_title'");
      $res=mysqli_num_rows($sql);
      if ($res>0) {
           if (isset($_GET['id']) && $_GET['id']!='') {
               $getdata=mysqli_fetch_assoc($sql);
               if ($id==$getdata['id']) {
                 
               }else{
                 $msg="title  already exists ";
               }
           }else{
            $msg="title  already exists ";
           }
      }

     if ($_GET['id']==0) {
        if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg') {
          $msg="please select only png jpg and jpeg image";
        }
      }else{
         if ($_FILES['image']['type']!='') {
            if ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg'&& $_FILES['image']['type']!='image/jpeg') {
          $msg="please select only png jpg and jpeg image";
        }
         }
      }
        
         


  

  if ($msg=='') {
       if (isset($_GET['id']) && $_GET['id']!='') {
            if ($_FILES['image']['name']!='') {
               $image=rand(111111,999999).'_'.$_FILES['image']['name'];
               move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);
               $image2=rand(111111,999999).'_'.$_FILES['image2']['name'];
               move_uploaded_file($_FILES['image2']['tmp_name'],'upload/'.$image2);
                $wedding=rand(111111,999999).'_'.$_FILES['image3']['name'];
               move_uploaded_file($_FILES['image3']['tmp_name'],'upload/'.$wedding);
                $insta=rand(111111,999999).'_'.$_FILES['image4']['name'];
               move_uploaded_file($_FILES['image4']['tmp_name'],'upload/'.$insta);   
               $update="update shivam_seo set  meta_description='$meta_desc',meta_keyword=' $meta_keyword',Meta_image='$image',Meta_title=' $meta_title',Meta_banner='$image2', banner_title=' $banner_title',wedding_image='$wedding',wedding_title='$wedding_title',instagram_image='$insta' where id='$id'";
            }else{
             $update="update shivam_seo set  meta_description='$meta_desc',meta_keyword=' $meta_keyword',Meta_title=' $meta_title',banner_title=' $banner_title',wedding_title='$wedding_title' where id='$id'";
            }
            mysqli_query($con,$update);
       }else{
          $image=rand(111111,999999).'_'.$_FILES['image']['name'];
               move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);
          $image2=rand(111111,999999).'_'.$_FILES['image2']['name'];
               move_uploaded_file($_FILES['image2']['tmp_name'],'upload/'.$image2);
             $wedding=rand(111111,999999).'_'.$_FILES['image3']['name'];
               move_uploaded_file($_FILES['image3']['tmp_name'],'upload/'.$wedding);
                $insta=rand(111111,999999).'_'.$_FILES['image4']['name'];
               move_uploaded_file($_FILES['image4']['tmp_name'],'upload/'.$insta);   
              $insert=mysqli_query($con,"insert into shivam_seo(meta_description,meta_keyword,Meta_image,Meta_title,Meta_banner,  banner_title, wedding_image, wedding_title,instagram_image) values('$meta_desc','$meta_keyword','$image','$meta_title',' $image2','$banner_title','$wedding','$wedding_title','$insta')");
       }
       header('location:seo.php');
       die();
  }
 
}


 
?>


 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Site_seo</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/style.css?v=<?php echo time(); ?>">
</head>
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
            <h1>Manage Product</h1>
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
                <h3 class="card-title">Add seo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryimage">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image"class="custom-file-input" id="exampleInputFile" >
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                      </div>
                      <div class="custom-file">
                        <input type="file" name="image2"class="custom-file-input" id="exampleInputFile"  >
                        <label class="custom-file-label" for="exampleInputFile">Choose Banner Image</label>
                      </div>
                       <div class="custom-file">
                        <input type="file" name="image3"class="custom-file-input" id="exampleInputFile"  >
                        <label class="custom-file-label" for="exampleInputFile"<?php echo $image_required='required'?>>Wedding Slider</label>
                      </div>
                       <div class="custom-file">
                        <input type="file" name="image4"class="custom-file-input" id="exampleInputFile"  >
                        <label class="custom-file-label" for="exampleInputFile">Wedding Insta</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="nav-icon far fa-image"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="categoryname">Meta Title</label>
                    <input type="text" name="metatitle" class="form-control" id="categoryname" placeholder="enter Product meta title"  value="<?php echo  $meta_title?>">
                  </div>
                    <div class="form-group">
                    <label for="categoryname">Wedding Title</label>
                    <input type="text" name="wedding_title" class="form-control" id="categoryname" placeholder="enter Product meta title"  value="<?php echo  $wedding_title?>">
                  </div>
                  <label for="categoryname"> Banner Title</label>
                    <input type="text" name="metabanner" class="form-control" id="categoryname" placeholder="enter Product meta title"  value="<?php echo  $banner_title?>">
                  </div>
                  <div class="form-group">
                    <label for="categoryname">Meta Description</label>
                    <input type="text" name="metadesc" class="form-control" id="categoryname" placeholder="enter Product meta description "  value="<?php echo $meta_desc?>">
                  </div>
                  <div class="form-group">
                    <label for="categoryname">Meta Keyword</label>
                    <input type="text" name="metakeyword" class="form-control" id="categoryname" placeholder="enter Product meta Keyword"  value="<?php echo $meta_keyword?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit Seo</button>
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
