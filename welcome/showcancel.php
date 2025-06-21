<?php
include('adminheader.php');
include('db.php');
$qr="select * from `depositetb` where txstatus='cancel' order by `id` desc";
$re=mysqli_query($con,$qr);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="lightyellow">
<center>
<form method="post" style="margin-top: 120px;">
<center>
<table border="1px" bgcolor="lightblue" style="height: 100px;width: 500px;">
<tr>
<th>Total</th>
<th><?php $qr1="select sum(txamount) as total from `depositetb` where txstatus='cancel'";
$result=mysqli_query($con,$qr1); 
while ($row = mysqli_fetch_assoc($result)){ echo $row['total'];}?></th>
</tr>
<table>
<table border="1px" bgcolor="lightblue" style="height: 100px;width: 500px;">
<tr>
<th><a href="showpayments.php">All</a></th>
<th><a href="showsuccess.php">Successed</a></th>
<th><a href="showfail.php">Failed</a></th>
<th><a href="showcancel.php">Canceled</a></th>
</tr>
</table> 
</center>


	<table border="1px" bgcolor="lightblue" style="height: 100px;width: 500px;">
		 
		<th>Id</th>
		<th>Email</th>
		<th>Amount</th>
		<th>Status</th>
		<th>Time</th>
		 
		</tr>
		<?php 
			while ($ar=mysqli_fetch_assoc($re)) {
		?>
		<tr>
			<td><center><?php echo $ar['id']; ?></center></td>
			<td><center><?php echo $ar['email']; ?></center></td>
			<td><center><?php echo $ar['txamount']; ?></center></td> 
			<td><center><?php echo $ar['txstatus']; ?></center></td> 
			<td><center><?php echo $ar['time']; ?></center></td>
		
		</tr>
		<?php	} ?>
	</table>
</form>
</center>
</body>
</html>