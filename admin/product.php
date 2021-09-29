<?php
require('theme/database.php');
require('theme/function.inc.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}

if (isset($_GET['type']) && $_GET['type']!='') {
   $type=get_safe_value($con,$_GET['type']);
   if ($type=='status') {
      $operation=get_safe_value($con,$_GET['operation']);
      $id=get_safe_value($con,$_GET['id']);
      if ($operation=='active') {
        $status='1';
      }else{
          $status='0';
      }
      $update="update product set status='$status' where id='$id'";
      mysqli_query($con,$update);
   }
  if($type=='delete'){
    $id=get_safe_value($con,$_GET['id']);
    $delete="delete from product where id='$id'";
    mysqli_query($con,$delete);
  }
}

$sql="select product.*,categories.categories from product,categories where product.cate_id=categories.id order by product.id desc";

$res=mysqli_query($con,$sql);





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="dist/css/style.css?v=<?php echo time(); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="addproduct.php">Add Product</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      
                      <th class="serial">#</th>
                      <th>Product Categories</th>
                      <th>Product Name</th>
                      <th>Product Image</th>
                       <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                   $i=1;
                     while($row=mysqli_fetch_assoc($res)){



                   ?>
                    <tr>
                      <td class="serial"><?php echo $i;?></td>
                      <td class="serial"><?php echo $row['categories']?></td>
                      <td class="serial"><?php echo $row['product_name']?></td>
                      <td><img src="<?php echo 'upload/'.$row['product_image']?>"></td>
                      <td>
                      
                      <?php
                       if ($row['status']==1) {
                         echo "<span class='active'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                       }else{
                        echo "<span class='deactive'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                       }
                      ?>
                      </td>
                      <td>
                         <?php
                           echo "<span class='edit'><a href='addproduct.php?id=".$row['id']."'>Edit</a><span>&nbsp;";

                         ?>
                      </td>
                       <td>
                         <?php
                           
                             echo "<span class='error_de'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;";
                         ?>
                      </td>
                      </tr>
                   <?php $i++;}?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->


    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  
    <!-- /.content -->
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
