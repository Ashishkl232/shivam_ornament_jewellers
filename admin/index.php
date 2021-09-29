<?php
require('theme/database.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}


if (isset($_GET['type']) && $_GET['type']!='') {
   $type=mysqli_real_escape_string($con,$_GET['type']);
   if ($type=='delete') {
     $id=mysqli_real_escape_string($con,$_GET['id']);
     $delete="delete from shivam_contact where id='$id'";
     mysqli_query($con,$delete);
   }
}

$contact=mysqli_query($con,"select * from shivam_contact");
$res=mysqli_num_rows($contact);


?>

<?php require ('link/csslink.php')?>
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Contact Us</h3>

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
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Date</th>
                      <th>Message</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    while($row=mysqli_fetch_assoc($contact)) {
                      
                      $id=$row['id'];
                      $name=$row['Name'];
                      $email=$row['Email'];
                      $Mobile=$row['Mobile'];
                      $date=$row['date'];
                      $Message=$row['Message'];
                    

                    ?>
                    <tr>
                      <td><?php echo $id?></td>
                      <td><?php echo $name?></td>
                      <td><?php echo $email?></td>
                      <td><?php echo $Mobile?></td>
                      <td><?php echo $date?></td>
                      <td><?php echo $Message?></td>
                      <td>
                        <?php
                         echo"<span class='error_de'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";

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
  <?php require ('link/jquery.php')?>