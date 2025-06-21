<?php

// $con=mysqli_connect("localhost","root","parthil123","win2");
$con = mysqli_connect("sql12.freesqldatabase.com", "sql12786031", "gIXQl7vLgs", "sql12786031", 3306);

$email = $_REQUEST['email'];
$wamu = $_REQUEST['wamu'];
$damu = $_REQUEST['damu'];
$spindex = $_REQUEST['spindex'];


$qry1 = "select * from `usertb` where `email`='$email'";
$res1 = mysqli_query($con, $qry1);
$cnt1 = mysqli_num_rows($res1);

if ($cnt1 == 1) {

	$res = mysqli_query($con, "update `usertb` set `wamu`='" . $wamu . "',`damu`='" . $damu . "',`spindex`='" . $spindex . "'  where `email`='" . $email . "'");

	if ($res) {
		echo "1";
	} else {
		"0";
	}
} else {

	echo "0";
}
?>