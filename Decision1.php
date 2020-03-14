<?php
$priv = array(-1,-1,-1,-1,-1);
$empid=$_SESSION["Emp_Id"];
$s = "SELECT * FROM login where Emp_Id=$empid";
$r = $conn->query($s);
$ro = mysqli_fetch_assoc($r);
if($ro["P1"] == 'TRUE')
	$priv[0] = 1;
if($ro["P2"] == 'TRUE')
	$priv[1] = 1;
if($ro["P3"] == 'TRUE')
	$priv[2] = 1;
if($ro["P4"] == 'TRUE')
	$priv[3] = 1;
if($ro["P5"] == 'TRUE')
	$priv[4] = 1;

if($priv[0]==1)
{
	echo "<style>"." #section0,#section1,#section2,#section3,#section4,#section41,#section42,#section43,#section5,#section51,#section52,#section53,#section6,#section7{ display:block; visibility:vissible; } "."</style>";
	echo "<style>"." #sectionA,#sectionB,#sectionC,#sectionD,#sectionD1,#sectionD2,#sectionD3,#sectionE,#sectionE1,#sectionE2,#sectionE3,#sectionF,#sectionG,#sectionH{ display:block; visibility:vissible; } "."</style>";
	echo "<style>"." #section24,#sectionX{ display:block; visibility:vissible; }"."</style>";
}
else if($priv[0]!=1)
{
	echo "<style>"." #section0,#section1,#section2,#section3,#section4,#section41,#section42,#section43,#section51,#section52,#section53,#section6,#section7{ display:none; visibility:hidden; } "."</style>";
	echo "<style>"." #sectionA,#sectionB,#sectionC,#sectionD,#sectionD1,#sectionD2,#sectionD3,#sectionE,#sectionE1,#sectionE2,#sectionE3,#sectionF,#sectionG,#sectionH{ display:none; visibility:hidden; } "."</style>";
	echo "<style>"." #section24,#sectionX{ display:none; visibility:hidden; }"."</style>";
}

if($priv[2]==1)
{
	echo "<style>"." #section25,#sectionV{ display:block; visibility:visible; } "."</style>";
}
else if($priv[2]!=1)
{
	echo "<style>"." #section25,#sectionV{ display:none; visibility:hidden; } .section25{ display:none; visibility:hidden; } "."</style>";
}

if($priv[3]==1)
{
	echo "<style>"." #section23,#sectionZ{ display:block; visibility:visible; } "."</style>";
}
else if($priv[3]!=1)
{
	echo "<style>"." #section23,#sectionZ{ display:none; visibility:hidden; } .section23{ display:none; visibility:hidden; } "."</style>";
}
