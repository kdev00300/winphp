<?php

// $con=mysqli_connect("localhost","root","parthil123","win2");
$con = mysqli_connect("sql12.freesqldatabase.com", "sql12786031", "gIXQl7vLgs", "sql12786031", 3306);

$email = $_REQUEST['email'];
$tid = $_REQUEST['tid'];
$amu = $_REQUEST['amu'];
$sts = $_REQUEST['status'];



$qry1 = "select * from `usertb` where `email`='$email'";
$res1 = mysqli_query($con, $qry1);
$cnt = mysqli_num_rows($res1);
$row = mysqli_fetch_array($res1);

$damount = $row['damu'];
if ($sts == "success") {
	$damount = $row['damu'] + $amu;
}


if ($cnt == 1) {

	$res = mysqli_query($con, "insert into `depositetb` values(null,'" . $email . "','" . $tid . "','" . $sts . "','" . $amu . "','" . date("Y-m-d") . "')");

	if ($res) {
		$qry = "update `usertb` set `damu`='" . $damount . "' where `email`='" . $email . "'";

		$x = mysqli_query($con, $qry);

		if ($x) {
			echo "1";
		} else {
			echo "0";
		}

	} else {
		echo "0";
	}
} else {
	echo "0";
}
?>