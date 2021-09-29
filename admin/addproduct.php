<?php
require('theme/database.php');
require('theme/function.inc.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}
 /*error_reporting(0);*/
 $cate_id='';
 $name='';
 $image='';
 $meta_title='';
 $meta_desc='';
 $meta_keyword='';


 $msg='';

 $image_required='required';
 if(isset($_GET['id']) && $_GET['id']!=''){
     $image_required='';
     $id=get_safe_value($con,$_GET['id']);
     $res=mysqli_query($con,"select * from product where id='$id'");
     $count=mysqli_num_rows($res);
     if ($count>0) {
         $row=mysqli_fetch_assoc($res);
         $cate_id= $row['cate_id'];
         $name=$row['product_name'];
         $meta_title=$row['meta_title'];
         $meta_desc=$row['meta_description'];
         $meta_keyword=$row['meta_keyword'];
     }else{
         header('location:product.php');
         die();
     }
 }

 if(isset($_POST['submit'])){
      $cate_id=get_safe_value($con,$_POST['cate_id']);
      $name=get_safe_value($con,$_POST['name']);
      $meta_title=get_safe_value($con,$_POST['metatitle']);
      $meta_desc=get_safe_value($con,$_POST['metadesc']);
      $meta_keyword=get_safe_value($con,$_POST['metakeyword']);
      $sql=mysqli_query($con,"select * from product where product_name='$name'");
      $res=mysqli_num_rows($sql);
      if ($res>0) {
           if (isset($_GET['id']) && $_GET['id']!='') {
               $getdata=mysqli_fetch_assoc($sql);
               if ($id==$getdata['id']) {
                 
               }else{
                 $msg="Product name already exists ";
               }
           }else{
            $msg="Product name already exists ";
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
               $update="update product set cate_id='$cate_id', product_name='$name', product_image='$image',meta_title=' $meta_title',meta_description='$meta_desc',meta_keyword=' $meta_keyword' where id='$id'";
            }else{
              $update="update product set cate_id='$cate_id', product_name='$name',meta_title=' $meta_title',meta_description='$meta_desc',meta_keyword=' $meta_keyword' where id='$id'";
            }
            mysqli_query($con,$update);
       }else{
          $image=rand(111111,999999).'_'.$_FILES['image']['name'];
               move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);
              $insert=mysqli_query($con,"insert into product(cate_id,product_name,product_image,meta_title,meta_description,meta_keyword,status) values('$cate_id','$name','$image','$meta_title','$meta_desc','$meta_keyword',1)");
       }
       header('location:product.php');
       die();
  }
 }



 
?>


 
<?php require ('link/csslink.php')?>
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
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="category" class="form-control-label">Category</label>
                    <select class="form-control" name="cate_id">
                      <option>Select Category</option>
                       <?php

                        $sql=mysqli_query($con,"select id ,categories from categories order by categories asc");
                        while($row=mysqli_fetch_assoc($sql)){
                           if ($row['id']==$cate_id) {
                            echo"<option selected value=".$row['id'].">".$row['categories']."</option>";
                           }else{
                             echo"<option value=".$row['id'].">".$row['categories']."</option>";
                           }
                        }

                       ?>

                    </select>                    
                  </div>
                  <div class="form-group">
                    <label for="categoryname">Product name</label>
                    <input type="text" name="name" class="form-control" id="categoryname" placeholder="enter Product name" required value="<?php echo  $name ?>">
                  </div>
                  <div class="form-group">
                    <label for="categoryimage">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image"class="custom-file-input" id="exampleInputFile"<?php echo  $image_required?> >
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="nav-icon far fa-image"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="categoryname">Meta Title</label>
                    <input type="text" name="metatitle" class="form-control" id="categoryname" placeholder="enter Product meta title" required value="<?php echo  $meta_title ?>">
                  </div>
                  <div class="form-group">
                    <label for="categoryname">Meta Description</label>
                    <input type="text" name="metadesc" class="form-control" id="categoryname" placeholder="enter Product meta description " required value="<?php echo $meta_desc ?>">
                  </div>
                  <div class="form-group">
                    <label for="categoryname">Meta Keyword</label>
                    <input type="text" name="metakeyword" class="form-control" id="categoryname" placeholder="enter Product meta Keyword" required value="<?php echo $meta_keyword?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
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
