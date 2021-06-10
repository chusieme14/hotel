<?php
    include('db.php');
?>
<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>3J-N HOTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    
					<li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Room Booking</a>
                    </li>
                    <li>
                        <a class="active-menu" href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    
                    <li>
                        <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Payment Details<small> </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
				 
				 
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                            <input id="myBtn" type="submit"  name="add_payment" value="ADD PAYMENT" class="btn btn-primary">
                            <input type="submit"  name="generate_pdf" value="Create PDF" class="btn btn-primary">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
											<th>Room type</th>
                                            <th>Bed Type</th>
                                            <th>Check in</th>
											<th>Check out</th>
											<th>No of Room</th>
                                            <th>Room Rent</th>
											<th>Bed Rent</th>
											<th>Gr.Total</th>
											<th>Print</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										include ('db.php');
										$sql="select * from payment";
										$re = mysqli_query($con,$sql);
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											
											if($id % 2 ==1 )
											{
												echo"<tr class='gradeC'>
													<td>".$row['title']." ".$row['fname']." ".$row['lname']."</td>
													<td>".$row['troom']."</td>
													<td>".$row['tbed']."</td>
													<td>".$row['cin']."</td>
													<td>".$row['cout']."</td>
													<td>".$row['nroom']."</td>
													<td>".$row['ttot']."</td>
													<td>".$row['mepr']."</td>
													<td>".$row['btot']."</td>
													<td>".$row['fintot']."</td>
													<td><a href=print.php?pid=".$id ." <button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button></td>
													</tr>";
											}
											else
											{
												 echo"<tr class='gradeU'>
													<td>".$row['title']." ".$row['fname']." ".$row['lname']."</td>
													<td>".$row['troom']."</td>
													<td>".$row['tbed']."</td>
													<td>".$row['cin']."</td>
													<td>".$row['cout']."</td>
													<td>".$row['nroom']."</td>
													<td>".$row['ttot']."</td>
													<td>".$row['mepr']."</td>
													<td>".$row['btot']."</td>
													<td>".$row['fintot']."</td>
													<td><a href=print.php?pid=".$id ." <button class='btn btn-primary'> <i class='fa fa-print' ></i>  Print</button></td>
													</tr>";
											
											}
										
										}
										
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                </div>
               
            </div>
        
               
    </div>
<!-- Trigger/Open The Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ADD PAYMENT
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>Title*</label>
                                            <select name="title" class="form-control" required >
												<option value selected ></option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Miss.">Miss.</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
												<option value="Prof.">Prof.</option>
												<option value="Rev .">Rev .</option>
												<option value="Rev . Fr">Rev . Fr .</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>First Name</label>
                                            <input name="fname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Last Name</label>
                                            <input name="lname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" required>
                                            
                               </div>
							   
								<div class="form-group">
                                            <label>Phone Number</label>
                                            <input name="phone" type ="text" class="form-control" required>
                                            
                               </div>
							   
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           ADD PAYMENT
                        </div>
                        <div class="panel-body">
						<div class="panel-body">
								<div class="form-group">
                                    <label>Type Of Room *</label>
                                    <select id="troom" name="troom"  class="form-control" required>
                                        <option value selected ></option>
                                        <option value="Superior Room">SUPERIOR ROOM</option>
                                        <option value="Deluxe Room">DELUXE ROOM</option>
                                        <option value="Guest House">GUEST HOUSE</option>
                                        <option value="Single Room">SINGLE ROOM</option>
                                    </select>
                                </div>
							  <div class="form-group">
                                    <label>Bedding Type</label>
                                    <select name="bed" class="form-control" required>
                                        <option value selected ></option>
                                        <option value="Single">Single</option>
                                        <option value="Double">Double</option>
                                        <option value="Triple">Triple</option>
                                        <option value="Quad">Quad</option>
                                        <option value="None">None</option>
                                    </select>
                              </div>
							  <div class="form-group">
                                    <label>No.of Rooms *</label>
                                    <select name="nroom" class="form-control" required>
                                        <option value selected ></option>
                                        <?php
                                            include ('db.php');
                                            $sql="select * from room where  place = 'Free'";
                                            $re = mysqli_query($con,$sql);
                                            while($row = mysqli_fetch_array($re))
                                            {
                                                echo"
                                                    <option value=".$row['id'].">".$row['id']."</option>
                                                ";
                                            }
                                        ?>
                                        <!--  <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option> -->
                                    </select>
                              </div>
							 
							 
							  
							  <div class="form-group">
                                    <label>Check-In</label>
                                    <input name="cin" type ="date" class="form-control">
                                            
                               </div>
							   <div class="form-group">
                                    <label>Check-Out</label>
                                    <input name="cout" type ="date" class="form-control">
                                            
                               </div>
                       </div>
                        <div style="text-align:right">
                        <input type="submit"  name="add" value="ADD" class="btn btn-primary">
                        </div>
            </div>
  </div>

</div>

<?php
include('db.php');
if(isset($_POST['add']))
{
    $con=mysqli_connect("localhost","root","","hotel");
    $addedPayment="INSERT INTO `roombook`(`Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`,`stat`,`nodays`) VALUES 
    ('$_POST[title]','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[nation]','$_POST[country]','$_POST[phone]','$_POST[troom]','$_POST[bed]','$_POST[nroom]','$_POST[meal]','$_POST[cin]','$_POST[cout]','$new',datediff('$_POST[cout]','$_POST[cin]'))";
    if (mysqli_query($con,$addedPayment))
    {
        $sql ="Select * from roombook where email = '$_POST[email]' and name = '$_POST[name]'";

				$re = mysqli_query($con,$sql);
				
					$title = $_POST['title'];
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$email = $_POST['email'];
					$Phone = $_POST['phone'];
					$troom = $_POST['troom'];
					$nroom = $_POST['nroom'];
					$bed = $_POST['bed'];
					$non = $_POST['nroom'];
					$cin = $_POST['cin'];
					$cout = $_POST['cout'];
					$sta = $_POST['stat'];
					$days = datediff("'$_POST[cout]'","'$_POST[cin]'");
				

        $new = "Confirm";
            
        if($new=="Confirm")
        {
        $urb = "UPDATE `roombook` SET stat='$new', NRoom ='$_POST[nroom]' WHERE email = '$_POST[email]'";
        
            if( mysqli_query($con,$urb))
                {	
                    echo '<script>alert("Email not Sent") </script>';
                    //echo "<script type='text/javascript'> alert('Guest Room booking is conform')</script>";
                    //echo "<script type='text/javascript'> window.location='home.php'</script>";
                        $type_of_room = 0;       
                            if($troom=="Superior Room")
                            {
                                $type_of_room = 3200;
                            
                            }
                            else if($troom=="Deluxe Room")
                            {
                                $type_of_room = 2200;
                            }
                            else if($troom=="Guest House")
                            {
                                $type_of_room = 1800;
                            }
                            else if($troom=="Single Room")
                            {
                                $type_of_room = 1500;
                            }
                            
                            
                            
                            
                            if($bed=="Single")
                            {
                                $type_of_bed = $type_of_room * 1/100;
                            }
                            else if($bed=="Double")
                            {
                                $type_of_bed = $type_of_room * 2/100;
                            }
                            else if($bed=="Triple")
                            {
                                $type_of_bed = $type_of_room * 3/100;
                            }
                            else if($bed=="Quad")
                            {
                                $type_of_bed = $type_of_room * 4/100;
                            }
                            else if($bed=="None")
                            {
                                $type_of_bed = $type_of_room * 0/100;
                            }
                            
                            
                            if($meal=="Room only")
                            {
                                $type_of_meal=$type_of_bed * 0;
                            }
                            else if($meal=="Breakfast")
                            {
                                $type_of_meal=$type_of_bed * 2;
                            }else if($meal=="Half Board")
                            {
                                $type_of_meal=$type_of_bed * 3;
                            
                            }else if($meal=="Full Board")
                            {
                                $type_of_meal=$type_of_bed * 4;
                            }
                            
                            
                            $ttot = $type_of_room * $days * $nroom;
                            $mepr = $type_of_meal * $days;
                            $btot = $type_of_bed *$days;
                            
                            $fintot = $ttot + $mepr + $btot ;
                                
                                //echo "<script type='text/javascript'> alert('$count_date')</script>";
                            $psql = "INSERT INTO `payment`(`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`,`meal`, `mepr`, `btot`,`fintot`,`noofdays`) VALUES ('$id','$title','$fname','$lname','$troom','$bed','$nroom','$cin','$cout','$ttot','$meal','$mepr','$btot','$fintot','$days')";
                            
                            if(mysqli_query($con,$psql))
                            {	$free="Free";
                                $rpsql = "UPDATE `room` SET `place`='$free',`cusid`='$id' where bedding ='$bed' and type='$troom' ";
                            }
                    
            }
                
                    
        }
        echo "<script type='text/javascript'> alert('Payment has been added')</script>";
    }
    else
    {
        echo "<script type='text/javascript'> alert('Error adding payment in database')</script>";
    }
}
?>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</html>
