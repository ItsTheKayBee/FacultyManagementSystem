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
	/*
	0 = Profile & Forms
	1 = Edit Privelleges
	2 = Add MEMBER
	3 = Report Generation
	*/
	/*echo "<style>"." #section0,#section1,#section2,#section3,#section41,#section42,#section43,#section51,#section52,#section53,#section6,#section7{ display:none; visibility:hidden; } "."</style>";*/

	if($priv[0]==1)
	{
		/*echo "<style>"." #section0{ display:block;  } "."</style>";
		echo "<style>"." #section3,#section31,#section32,#section33,#section34,#section35,#section36,#section37{   } "."</style>";*/
		echo "<style>"." #section0,#section1,#section2,#section3,#section4,#section41,#section42,#section43,#section5,#section51,#section52,#section53,#section6,#section7{ display:block; visibility:vissible; } "."</style>";
		echo "<style>"." #sectionA,#sectionB,#sectionC,#sectionD,#sectionD1,#sectionD2,#sectionD3,#sectionE,#sectionE1,#sectionE2,#sectionE3,#sectionF,#sectionG,#sectionH{ display:block; visibility:vissible; } "."</style>";
		echo "<style>"." #section24,#sectionX{ display:block; visibility:vissible; }"."</style>";
		//echo "<script language='javascript'>alert('priv1');</script>";
	}
	else if($priv[0]!=1)
	{
		//header('Location:main.php');
		echo "<style>"." #section0,#section1,#section2,#section3,#section4,#section41,#section42,#section43,#section51,#section52,#section53,#section6,#section7{ display:none; visibility:hidden; } "."</style>";
		echo "<style>"." #sectionA,#sectionB,#sectionC,#sectionD,#sectionD1,#sectionD2,#sectionD3,#sectionE,#sectionE1,#sectionE2,#sectionE3,#sectionF,#sectionG,#sectionH{ display:none; visibility:hidden; } "."</style>";
		echo "<style>"." #section24,#sectionX{ display:none; visibility:hidden; }"."</style>";
		/**/
	}

	if($priv[2]==1)
	{
		echo "<style>"." #section22,#sectionY{ display:block; visibility:visible; } "."</style>";
		//echo "<script language='javascript'>alert('priv3');</script>";
	}
	else if($priv[2]!=1)
	{
		echo "<style>"." #section22,#sectionY{ display:none; visibility:hidden; } .section22{ display:none; visibility:hidden; } "."</style>";
	}

	if($priv[3]==1)
	{
		echo "<style>"." #section23,#sectionZ{ display:block; visibility:visible; } "."</style>";
		//	echo "<script language='javascript'>alert('priv4');</script>";
	}
	else if($priv[3]!=1)
	{
		echo "<style>"." #section23,#sectionZ{ display:none; visibility:hidden; } .section23{ display:none; visibility:hidden; } "."</style>";

	}

?>
