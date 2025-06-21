<?php

// $con=mysqli_connect("localhost","root","parthil123","win2");
$con = mysqli_connect("sql12.freesqldatabase.com", "sql12786031", "gIXQl7vLgs", "sql12786031", 3306);


// set the timezone first
if (function_exists('date_default_timezone_set')) {
	date_default_timezone_set("Asia/Kolkata");
}

$uname = $_REQUEST['uname'];
$email = $_REQUEST['email'];
$uid = $_REQUEST['uid'];
$img = $_REQUEST['img'];
$ctime = date('d-m-Y h:i:s A', time());
$qry1 = "select * from `usertb` where `email`='$email'";
$res1 = mysqli_query($con, $qry1);
$cnt1 = mysqli_num_rows($res1);

if ($cnt1 == 1) {
	// already
	while ($row = $res1->fetch_assoc()) {
		echo "spindex=" . $row["spindex"];
	}
} else {
	$qr = "insert into `usertb` values(null,'" . $uname . "','" . $email . "','" . $uid . "','" . $img . "',50,0,0,'" . $ctime . "')";

	$res = mysqli_query($con, $qr);


	if ($res) {
		echo "0";
	} else {
		// error
		echo "2";
	}
}
?>