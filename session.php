<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{ 
    if(isset($_POST['submit'])){    
$status=1;
$session=$_POST['session'];

$sql="update session set status='$status' where session='$session';";
$sql.="update session set status='0' where session!='$session';";
$query = mysqli_multi_query($con, $sql);
if($query){
echo '<script>alert("session updated successfully")</script>';
echo "<script>window.location.href='session.php'</script>";
}
    
 }?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>session</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      
     <?php include('leftbar.php')?>;

           
         <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Session
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="form-group">
		    
			
			 <div class="col-lg-2">
			<label>Session<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
                  <div class="col-lg-4">
 <?php $query=mysqli_query($con,"SELECT * FROM `session` where status=1");
            while($res=mysqli_fetch_array($query)){?> 
                <b>Current Session:</b>  <?php echo $res['session']?>
            <?php } ?><br />
<br />
<form method="post">
      <?php $query=mysqli_query($con,"SELECT * FROM `session`");
            while($res=mysqli_fetch_array($query)){?>   
		 <input type="radio" name="session" id="session" value="<?php echo $res['session']?>"  required="required">
		 &nbsp;&nbsp;<?php echo $res['session']?> <br>
		<?php  } ?>
		

			</div>         <br />
            <div class="col-lg-3">&nbsp;</div>
                 <div class="col-lg-9">
<input type="submit" class="btn btn-primary" name="submit" value="Update Session">
				 </div></div>
    
	</form>
                    </div>
                    
	
	
                </div>
                
            </div>
           
           
            
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <footer style ="margin-top:-60px; height :60px;background-color:  rgb(54, 127, 218);">
                <center><p style="font-size:15px;">CopyRight &copy; 2024 Student Record Management System </p></center>
            </footer>
</body>
</html>
<?php } ?>
