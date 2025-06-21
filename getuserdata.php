<?php

// $con=mysqli_connect("localhost","root","parthil123","win2");
$con = mysqli_connect("sql12.freesqldatabase.com", "sql12786031", "gIXQl7vLgs", "sql12786031", 3306);

$email = $_REQUEST['email'];

$qry1 = "select * from `usertb` where `email`='$email'";
$res = mysqli_query($con, $qry1);
$cnt1 = mysqli_num_rows($res);

if ($cnt1 == 1) {

  $arr = array();
  while ($ar = mysqli_fetch_assoc($res)) {
    $arr[] = $ar;
  }
  echo json_encode($arr);
} else {
  echo "0";
}
?>