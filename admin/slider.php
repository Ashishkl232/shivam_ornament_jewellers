<?php
require('theme/database.php');
require('theme/function.inc.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
     header('location:login');
    
}

if (isset($_GET['type']) && $_GET['type']!=''){
   $type=mysqli_real_escape_string($con,$_GET['type']);
   if ($type=='status') {
     $operation=mysqli_real_escape_string($con,$_GET['operation']);
     $id=mysqli_real_escape_string($con,$_GET['id']);
     if ($operation=='active') {
        $status='1';
     }else{
        $status='0';
     }
     $update="update slider set status='$status' where id='$id'";
     mysqli_query($con,$update);
   }

   if ($type=='delete') {
     $id=mysqli_real_escape_string($con,$_GET['id']);
     $delete="delete from slider where id='$id'";
     mysqli_query($con,$delete);
   }
}

$sql="select * from slider ";
$query=mysqli_query($con,$sql);
$res=mysqli_num_rows($query);



?>

<!---Meta Custom and all css link/csslink.php--->
<?php require('link/csslink.php')?>
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
              <li class="breadcrumb-item"><a href="addslider.php">Add Slider</a></li>
              
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
                      
                      <th>Title</th>
                      <th>Heading</th>
                      <th class="Categorymg">Slider Image</th>
                       <th class="Categorymg">Slider Image2</th>
                        <th class="Categorymg">Slider Image3</th>
                      
                      <th >Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                     $i=1;
                     while($row=mysqli_fetch_assoc($query)){


                   
                   ?>
                    <tr>
                      <td><?php echo $row['title']?></td>
                       <td><?php echo $row['heading']?></td>
                      <td class="tw"><img src="<?php echo 'upload/'.$row['image']?>"></td>
                      <td class="tw"><img src="<?php echo 'upload/'.$row['image2']?>"></td>
                      <td class="tw"><img src="<?php echo 'upload/'.$row['image3']?>"></td>
                      <td>
                        <?php
                        if ($row['status']==1) {
                          echo "<span class='active'><a href='?type=status&operation=deactive&id=".$row['id']."' >Active</a><span>&nbsp;";
                        }else{
                          echo "<span class='deactive'><a href='?type=status&operation=active& id=".$row['id']."' >Deactive</a><span>&nbsp;";
                        }
                         

            
                          
                          

                        ?>

                      </td>
                      <td>
                        <?php
                         echo "<span class='edit'><a href='addslider.php?id=".$row['id']."'>Edit</a><span>&nbsp;";

                            
                        ?>
                      </td>
                      <td>
                         <?php
                           echo "<span class='error_de'><a href='?type=delete&id=".$row['id']."' >Delete</a><span>&nbsp;";
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
  <!-- /.Footer and script link/jquery.php -->

<?php require ('link/jquery.php');?>