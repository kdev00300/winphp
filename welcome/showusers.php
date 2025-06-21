<?php
include('adminheader.php');
include('db.php');
$qr="select * from `usertb` order by `id` desc";
$re=mysqli_query($con,$qr);
if(@$_GET['action']=="delete")
{
	$id=$_GET['id'];
	$qr="delete from `usertb` where `id`=$id";

	$re=mysqli_query($con,$qr);
	if($re)
	{
		header('Location:showusers.php');
	}else{
		echo "Error";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="lightyellow">
<center>
<form method="post" style="margin-top: 100px;">
<center>
<table border="1px" bgcolor="lightblue" style="height: 100px;width: 500px;">
<tr>
<th><input type="text" id="emailid" name="emailid" placeholder="Enter Email for search"/></th>
<th><button type="button" name="search">Search</button></th>
</tr>
</table> 
</center>


	<table border="1px" bgcolor="lightblue" style="height: 100px;width: 500px;">
		 
		<th>Id</th>
		<th>UserName</th>
		<th>Email</th>
		<th>Image</th>
		<th>Deposite</th>
		<th>Won</th>
		<th>SPIndex</th>
		<th>Time</th>
		<th>Remove</th>
		<th>Update</th>
		</tr>
		<?php 
			while ($ar=mysqli_fetch_assoc($re)) {
		?>
		<tr>
			<td><center><?php echo $ar['id']; ?></center></td>
			<td><center><?php echo $ar['name']; ?></center></td>
			<td><center><?php echo $ar['email']; ?></center></td>
			<td><center><img src="<?php echo $ar['img']; ?>" height="50" width="50"></center></td>
			<td><center><?php echo $ar['damu']; ?></center></td>
			<td><center><?php echo $ar['wamu']; ?></center></td>
			<td><center><?php echo $ar['spindex']; ?></center></td>
			<td><center><?php echo $ar['time']; ?></center></td>
			<td><center><a href="showusers.php?action=delete&id=<?php echo $ar['id'];?>">Delete</a></center></td>
			<td><center><a href="showusers.php?action=update&id=<?php echo $ar['id'];?>">Update</a></center></td>
		</tr>
		<?php	} ?>
	</table>
</form>
</center>
</body>
</html>