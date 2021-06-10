<?php
	ob_start();	
	include ('db.php');

	$pid = $_GET['pid'];
	
	$sql ="select * from payment where id = '$pid' ";
	$re = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($re))
	{
		$id = $row['id'];
		$title = $row['title'];
		$fname = $row['fname'];
		$lname = $row['lname'];
		$troom = $row['troom'];
		$bed = $row['tbed'];
		$nroom = $row['nroom'];
		$cin = $row['cin'];
		$cout = $row['cout'];
		$meal = $row['meal'];
		$ttot = $row['ttot'];
		$mepr = $row['mepr'];
		$btot = $row['btot'];
		$fintot = $row['fintot'];
		$days = $row['noofdays'];
		
		
		
	
	}
	
	$type_of_room = 0;       
	if($troom=="Superior Room")
	{
		$type_of_room = 320;
	
	}
	else if($troom=="Deluxe Room")
	{
		$type_of_room = 220;
	}
	else if($troom=="Guest House")
	{
		$type_of_room = 180;
	}
	else if($troom=="Single Room")
	{
		$type_of_room = 150;
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
	require_once '../dompdf/autoload.inc.php';
	// use Dompdf/Dompdf;
	use Dompdf\Dompdf;

	$document = new Dompdf();
	
	// $page  = file_get_contents("download.php");
	
	$document->loadHtml($page);
	$html = '
	<html>
	<style>
	h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }
	
	table { font-size: 75%; table-layout: fixed; width: 100%; }
	table { border-collapse: separate; border-spacing: 2px; }
	th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
	th, td { border-radius: 0.25em; border-style: solid; }
	th { background: #EEE; border-color: #BBB; }
	td { border-color: #DDD; }

	article, article address, table.meta, table.inventory { margin: 0 0 3em; }
	article:after { clear: both; content: ""; display: table; }
	article h1 { clip: rect(0 0 0 0); position: absolute; }

	article address { float: left; font-size: 125%; font-weight: bold; }

	table.meta, table.balance { float: right; width: 36%; }
	table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

	table.meta th { width: 40%; }
	table.meta td { width: 60%; }
	
	table.inventory { clear: both; width: 100%; }
	table.inventory th { font-weight: bold; text-align: center; }
	
	table.inventory td:nth-child(1) { width: 26%; }
	table.inventory td:nth-child(2) { width: 38%; }
	table.inventory td:nth-child(3) { text-align: right; width: 12%; }
	table.inventory td:nth-child(4) { text-align: right; width: 12%; }
	table.inventory td:nth-child(5) { text-align: right; width: 12%; }
	table.balance th, table.balance td { width: 50%; }
	table.balance td { text-align: right; }
	</style>
	<body>
		<header>
			<h1>Invoice</h1>
			<address >
				<p>3J-N HOTEL,</p>
				<p>Calbayog City,<br>Province,<br>Samar.</p>
				<p>(+94) 65 222 44 55</p>
			</address>
		</header>
		<article>
			<h1>Recipient</h1>
			<address >
				<p>'.$title.$fname." ".$lname.' <br></p>
			</address>
			<table class="meta">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span >'.$id.'</span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
					<td><span >'.$cout.'</span></td>
				</tr>
				
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Item</span></th>
						<th><span >No of Days</span></th>
						<th><span >Rate</span></th>
						<th><span >Quantity</span></th>
						<th><span >Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span >'.$troom.'</span></td>
						<td><span >'.$days.' </span></td>
						<td><span data-prefix>$</span><span >'.$type_of_room.'</span></td>
						<td><span >'.$nroom.' </span></td>
						<td><span data-prefix>$</span><span>'.$ttot.'</span></td>
					</tr>
					<tr>
						<td><span >'.$bed.'  Bed </span></td>
						<td><span >'.$days.'</span></td>
						<td><span data-prefix>$</span><span >'. $type_of_bed.'</span></td>
						<td><span >'. $nroom.' </span></td>
						<td><span data-prefix>$</span><span>'. $btot.'</span></td>
					</tr>
					<tr>
						<td><span >'. $meal.'  </span></td>
						<td><span >'. $days.'</span></td>
						<td><span data-prefix>$</span><span >'. $type_of_meal.'</span></td>
						<td><span >'. $nroom.' </span></td>
						<td><span data-prefix>$</span><span>'. $mepr.'</span></td>
					</tr>
				</tbody>
			</table>
			
			<table class="balance">
				<tr>
					<th><span >Total</span></th>
					<td><span data-prefix>$</span><span>'. $fintot.'</span></td>
				</tr>
				<tr>
					<th><span >Amount Paid</span></th>
					<td><span data-prefix>$</span><span >0.00</span></td>
				</tr>
				<tr>
					<th><span >Balance Due</span></th>
					<td><span data-prefix>$</span><span>'.$fintot.'</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span >Contact us</span></h1>
			<div >
				<p align="center">Email :- 3jnhotel@gmail.com || Web :- www.3jnhotel.com || Phone :- +94 65 222 44 55 </p>
			</div>
		</aside>
	</body>
	</html>
	';
	$document->loadHtml($html);
	$document->setPaper('A4','portrait');
	
	$document->render();
	
	$f;
	$l;
	if(headers_sent($f,$l))
	{
		echo $f,'<br/>',$l,'<br/>';
		die('now detect line');
	}
	$document->stream();
	echo "<script type='text/javascript'> alert('Booking Confirm')</script>";

?>
<?php
$free="Free";
$nul = null;
$rpsql = "UPDATE `room` SET `place`='$free',`cusid`='$nul' where `cusid`='$id'";
if(mysqli_query($con,$rpsql))
{
	$delsql= "DELETE FROM `roombook` WHERE id='$id' ";
	
	if(mysqli_query($con,$delsql))
	{
	
	}
}
?>
<?php 

ob_end_flush();

?>