<?php
require('theme/database.php');

if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}

if (isset($_GET['type']) && $_GET['type']!=''){
   $type=mysqli_real_escape_string($con,$_GET['type']);
   
   if ($type=='delete') {
     $id=mysqli_real_escape_string($con,$_GET['id']);
     $delete="delete from shivam_seo where id='$id'";
     mysqli_query($con,$delete);
   }
}

$sql="select * from shivam_seo ";
$query=mysqli_query($con,$sql);
$res=mysqli_num_rows($query);



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
      
              <!-- /.card-header -->
              <div class="content-wrapper">
                <div class="content-header">
                  <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1 class="m-0 ml-5">Seo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item mr-5"><a href="addseo.php">Add seo</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        
    <!-- Content Header (Page header) -->
     <?php
      while($row=mysqli_fetch_assoc($query)){

        ?>
       <section class="content-header">
      <div class="container-fluid">
        <div class='row mb-2'>
          <div class='col-sm-6'>
          
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <!-- left column -->
          <div class='col-md-12'>
            <!-- general form elements -->
            <div class='card card-primary'>
              <div class="card-header">
              <h3 class="card-title"> Seo</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body seo">
                  <div class="form-group">
                     <h3 class="heading"><?php echo $row['Meta_title']?></h3>
                  </div>

                  <div class="form-group">
                     
                    <img class="site"src="<?php echo 'upload/'.$row['Meta_image']?>">
                  </div>
                   <div class="form-group">
                     
                    <img class="site w-50 mr-5"src="<?php echo 'upload/'.$row['Meta_banner']?>">
                  </div>
                  <div class="form-group">
                    <label>Meta Descripton</label>
                    <p> <?php echo $row['meta_description']?></p>
                  <div class="form-group">
                    <label>Keyword</label>
                    <h6> <?php echo $row['meta_keyword']?></h6>
                </div>
                 <div class="form-group">
                    <label>Wedding Title</label>
                    <h6> <?php echo $row['wedding_title']?></h6>
                </div>
                 <div class="form-group">
                    <label>Banner Title</label>
                    <h6> <?php echo $row['banner_title']?></h6>
                </div>
               
                <!-- /.card-body -->

                <div class="card-footer">
                      <?php
                           echo"<span class='ed'><a href='addseo.php?id=".$row['id']."' >Edit</a><span>&nbsp;";
                         ?>
                </div>
              </form>
              
             
            </div>
            <!-- /.card -->

            <!-- general form elements -->
        
            <!-- /.card -->

            <!-- Input addon -->
            
            <!-- /.card -->
            <!-- Horizontal Form -->
           
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <?php }?>
    <!-- /.content -->
  </div>
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
