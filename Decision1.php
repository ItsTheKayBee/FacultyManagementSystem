<?php
$priv = array(0, 0,0, 0, 0);
$empid = $_SESSION["Emp_Id"];
$s = "SELECT * FROM login where Emp_Id=$empid";
$r = $conn->query($s);
$ro = mysqli_fetch_assoc($r);
if ($ro["P1"] == 'TRUE')
    $priv[0] = 1;
if ($ro["P2"] == 'TRUE')
    $priv[1] = 1;
if ($ro["P3"] == 'TRUE')
    $priv[2] = 1;
if ($ro["P4"] == 'TRUE')
    $priv[3] = 1;
if ($ro["P5"] == 'TRUE')
    $priv[4] = 1;