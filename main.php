<?php
include 'dbconnect.php';
if(!isset($_SESSION["Emp_Id"]))
  header('Location:logout.php');

  if(isset($_COOKIE["cook"]))
  {
    $_COOKIE["cook"] = "";
  }

setcookie("id", "", time() - 3600);
$eid = $_SESSION["Emp_Id"];


$sql2 = "SELECT * FROM personal_details";
$result2 = $conn->query($sql2);
$i=0;
$id = array();
$name = array();
$email = array();
$right = array();
while($row2 = mysqli_fetch_assoc($result2))
{
	if($row2["Emp3_Id"] == $eid)
	continue;
  $test = $row2["Emp3_Id"];
  $sql = "SELECT * FROM edit WHERE Emp1_Id=$eid AND Emp2_Id=$test";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result) > 0)
  $right[$i] = 1;
  else
  $right[$i] = 0;
	$id[$i] = $row2["Emp3_Id"];
	$name[$i] = $row2["Name"];
	$email[$i] = $row2["Email"];
	$i++;
}

	if(isset($_POST["ReportSubmit"]))
	{
		if(isset($_POST["name3"]))
			setCookie("id",$_POST["name3"]);
		header('location:testreport.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Priveleges : <?php echo $eid; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script>
  <script type="text/javascript">

	    $(document).ready(function()
	    {
	        $("#privs").hide();
	        $("#assprivs").click(function(e)
	        {
	            $("#privs").toggle(250);

	        });
	    });

	</script>
	<script type="text/javascript" src="main_js.js"></script>
  <script>

	document.cookie ="cook = ";


  	var sql = "";
  	var select = [0,0,0,0,0,0,0,0,0,0,0];

    	var key=[["Please select fields","All","Name","Gender","Email","Phone","DOB","Address","Joining Position","Joining Date","Years Of Experience","Promotion 1","Promotion 1 Date","Promotion 2","Promotion 2 Date","Promotion 3","Promotion 3 Date"],["Please select fields","All","SSC_Institute","SSC_Percentile","SSC_Year","HSC_Institute","HSC_Percentile","HSC_Year","Bachelors_In","Bachelors_Institute","Bachelors_Year","Bachelors_Percentile","Masters_In","Masters_Institute","Masters_Year","Masters_Percentile","Phd_In","Phd_Institute","Phd_Year","Phd_Percentile"],["Please Select Fields","All","Category","Course Id","Semester","Year"],["Please Select Fields","All","Book Name","ISBN","Date Published","Author","Authors Institute","Publisher Name","Co Authors","Edition"],["Please Select Fields","All","Name","Author","Title","Date","Type","Co Authors","Book Chapter","Peer Reviewed","Impact Factor","Publisher Name","Digital Object Identifier","Volume","Page Number","Issue","Citation","ISSN","Paid","SJR"],["Please Select Fields","All","Name","Location","Type","Date","Author","CoAuthors","H Index","Digital Object Identifier","Publisher Name","Proceding Name","Peer Reviewed","Theme","Paid","Page Number","ISSN","Organizer","Presented","Poster","Web","Citation Index"],["Please Select Fields","All","Title","Speaker","Organized By","Event Type","Location","Duration","Start Date","End Date","Number Of Participants"],["Please Select Fields","All","Name","Event Type","Role","Location","Start Date","End Date","Number Of Participants"],["Please Select Fields","All","Name","Description","Event Type","Duration","Location","Start Date","End Date"],["Please Select Fields","All","Name","Description","Type","Role","Date"],["Please Select Fields","All","Name","Description","Location","Role","Date"],["Please Select Fields","All","Title","Description","Type","Year","Student Details"]];


  	var val=[["","All","Name","Gender","Email","Contact","DOB","Address","Join_Pos","Join_Date","Years_Exp","Prom_1","Prom_1_Date","Prom_2","Prom_2_Date","Prom_3","Prom_3_Date"],["","All","SSC_Institute","SSC_Percentile","SSC_Year","HSC_Institute","HSC_Percentile","HSC_Year","Bachelors_In","Bachelors_Institute","Bachelors_Year","Bachelors_Percentile","Masters_In","Masters_Institute","Masters_Year","Masters_Percentile","Phd_In","Phd_Institute","Phd_Year","Phd_Percentile"],["","All","Category","Course_Id","Semester","Year"],["","All","Book_Name","ISBN","Date_Published"
		,"Author","Author_INST","Publisher_Name","Coauthors","Edition"],["","All","Name","Author","Title","Date","Type","CoAuthors","BookChapter","PeerReviewed","ImpactFactor","PublisherName","DigitalObjectIdentifier","Volume","PageNumber","Issue","Citation","ISSN","Paid","SJR"],["","All","Name","Place","Type","Date","Author","CoAuthors","H_Index","DOI","Pub_Name","Proc_Name","Peer","Theme","Paid","PageNo","ISSN","Organizer","Presented","Poster","Web","Citation_Index"],["","All","Title","Speaker","Organized_By","Event_Type","Place","Duration","Date_From","Date_To","Total_Participation"],["","All","Name","Type","Role","Place","Date_From","Date_To","Number_Participants"],["","All","Name","Description","Event_Type","Duration","Place","Date_From","Date_To"],["","All","Name","Description","Type","Role","Date"],["","All","Name","Description","Place","Role","Date"],["","All","Title","Description","Type","Year","StudentDetails"]];

		function dynamicdropdown(listindex)
		{
			document.getElementById("subcategory").length = 0;
			switch (listindex)
			{
				case "personal_details" :
				for(var i = 0; i < key[0].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[0][i],val[0][i]);
					break;

				case "AQ" :
				for(var i = 0; i < key[1].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[1][i],val[1][i]);
					break;
				case "courses" :
				for(var i = 0; i < key[2].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[2][i],val[2][i]);
					break;
				case "publication_books" :
				for(var i = 0; i < key[3].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[3][i],val[3][i]);
					break;
				case "publication_journals" :
				for(var i = 0; i < key[4].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[4][i],val[4][i]);
					break;
				case "publication_conferences" :
				for(var i = 0; i < key[5].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[5][i],val[5][i]);
					break;
				case "sttp_event_attended" :
				for(var i = 0; i < key[6].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[6][i],val[6][i]);
					break;
				 case "sttp_event_organized" :
				 for(var i = 0; i < key[7].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[7][i],val[7][i]);
					break;
				case "sttp_event_delivered" :
				for(var i = 0; i < key[8].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[8][i],val[8][i]);
					break;
				case "co_curricular" :
				for(var i = 0; i < key[9].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[9][i],val[9][i]);
					break;
				case "extra" :
				for(var i = 0; i < key[10].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[10][i],val[10][i]);
					break;
				case "projects" :
				for(var i = 0; i < key[11].length;i++)
					document.getElementById("subcategory").options[i]=new Option(key[11][i],val[11][i]);
					break;
			}
			return true;
		}
		var table="";
		var attribute="";
		var both="";
		var both1 = "";
		var table1 = "";
		var attr1 = "";
		var xyz = 1;


		function removeOption()
		{
			document.getElementById("cat").innerHTML = "";
			var a= document.getElementById("category").value;
			var y= document.getElementById("subcategory").value;
			var z= document.getElementById("category");
			var x = document.getElementById("subcategory");
			document.getElementById("caterror").innerHTML = "";
			document.getElementById("category").style = "";
			document.getElementById("subcaterror").innerHTML = "";
			document.getElementById("subcategory").style = "";
			if(both=="")
			{
				if(a !="" && y == "")
				{
					document.getElementById("subcaterror").innerHTML = "* Please Select A Sub-Category Before Clicking The \"Add\" Button";
					document.getElementById("subcategory").style = "border:2px solid red;";
					if(both!="")
						document.getElementById("cat").innerHTML = "<div class='cat'><b>"+both1+"</b></div>";
					return false;
				}
				else if(a=="" && y=="")
				{
					document.getElementById("caterror").innerHTML = "* Please Select A Category";
					document.getElementById("category").style = "border:2px solid red;";
					document.getElementById("subcaterror").innerHTML = "* Please Select A Sub-Category";
					document.getElementById("subcategory").style = "border:2px solid red;";
					if(both!="")
						document.getElementById("cat").innerHTML = "<div class='cat'><b>"+both1+"</b>f/div>";
					return false;
				}
			}
			else if(a !="" && y == "")
			{
				document.getElementById("subcaterror").innerHTML = "* Please Select A Sub-Category";
				document.getElementById("subcategory").style = "border:2px solid red;";
				document.getElementById("cat").innerHTML = "<div class='cat'><b>"+both1+"</b></div>";
				if(both!="")
						document.getElementById("cat").innerHTML = "<div class='cat'><b>"+both1+"</b></div>";
				return false;
			}

			var t1 = document.getElementsByClassName("catele")[z.selectedIndex-1].label;


			if(y=="")
			{
			return false;
			}
			if(y=="All")
			{
				z.remove(z.selectedIndex);
			}



			if(table=="")
			{
				table=a;
				table1 = t1;
			}
			else
			{
				table= ","+a;
				table1 = ", "+t1;
			}
			if(attribute=="")
			{
				attribute=y;
				attr1 = y;
			}
			else
			{
				attribute=","+y;
				attr1 = ": "+y;
			}
			if(both=="")
			{
				both=table+","+attribute;
				both1 = table1+" : "+attr1;
			}
			else
			{
				both+=(table+attribute);
				both1+=(table1+attr1);
			}



			document.getElementById("cat").innerHTML = "<div class='cat'><b>"+both1+"</b></div>";
						/*document.getElementById("cat").innerHTML += "<p>ghjgh</p>";
*/
			/*$("#cat").append($("<p class='cat'>"+both+"</p>"));
			$("#cat").append($("<p class='cat'>"+both+"</p>"));*/

			//document.getElementById("cat").innerHTML+= both;
			//document.getElementById("cat").innerHTML+= a;
			//document.getElementById("subcat").innerHTML+= y;

			switch (a)
			{
				case "personal_details" :
				    key[0].splice(x.selectedIndex,1);
   					val[0].splice(x.selectedIndex,1);
   					if((y!="All") && (select[0] == 0))
   					{
   						x.remove(1);
   						val[0].splice(1,1);
   						key[0].splice(1,1);
   						select[0]=1;
   					}
					break;

				case "AQ" :
					key[1].splice(x.selectedIndex,1);
   					val[1].splice(x.selectedIndex,1);
   					if((y!="All") && (select[1] == 0))
   					{
   						x.remove(1);
   						val[1].splice(1,1);
   						key[1].splice(1,1);
   						select[1]=1;
   					}
					break;
				case "courses" :
					key[2].splice(x.selectedIndex,1);
   					val[2].splice(x.selectedIndex,1);
   					if((y!="All") && (select[2] == 0))
   					{
   						x.remove(1);
   						val[2].splice(1,1);
   						key[2].splice(1,1);
   						select[2]=1;
   					}
					break;
				case "publication_books" :
					key[3].splice(x.selectedIndex,1);
   					val[3].splice(x.selectedIndex,1);
   					if((y!="All") && (select[3] == 0))
   					{
   						x.remove(1);
   						val[3].splice(1,1);
   						key[3].splice(1,1);
   						select[3]=1;
   					}
					break;
				case "publication_journals" :
					key[4].splice(x.selectedIndex,1);
   					val[4].splice(x.selectedIndex,1);
   					if((y!="All") && (select[4] == 0))
   					{
   						x.remove(1);
   						val[4].splice(1,1);
   						key[4].splice(1,1);
   						select[4]=1;
   					}
					break;
				case "publication_conferences" :
					key[5].splice(x.selectedIndex,1);
   					val[5].splice(x.selectedIndex,1);
   					if((y!="All") && (select[5] == 0))
   					{
   						x.remove(1);
   						val[5].splice(1,1);
   						key[5].splice(1,1);
   						select[5]=1;
   					}
					break;
				case "sttp_event_attended" :
					key[6].splice(x.selectedIndex,1);
   					val[6].splice(x.selectedIndex,1);
   					if((y!="All") && (select[6] == 0))
   					{
   						x.remove(1);
   						val[6].splice(1,1);
   						key[6].splice(1,1);
   						select[6]=1;
   					}
					break;
				 case "sttp_event_organized" :
					key[7].splice(x.selectedIndex,1);
   					val[7].splice(x.selectedIndex,1);
   					if((y!="All") && (select[7] == 0))
   					{
   						x.remove(1);
   						val[7].splice(1,1);
   						key[7].splice(1,1);
   						select[7]=1;
   					}
					break;
				case "sttp_event_delivered" :
					key[8].splice(x.selectedIndex,1);
   					val[8].splice(x.selectedIndex,1);
   					if((y!="All") && (select[8] == 0))
   					{
   						x.remove(1);
   						val[8].splice(1,1);
   						key[8].splice(1,1);
   						select[8]=1;
   					}
					break;
				case "co_curricular" :
					key[9].splice(x.selectedIndex,1);
   					val[9].splice(x.selectedIndex,1);
   					if((y!="All") && (select[9] == 0))
   					{
   						x.remove(1);
   						val[9].splice(1,1);
   						key[9].splice(1,1);
   						select[9]=1;
   					}
					break;
				case "extra" :
					key[10].splice(x.selectedIndex,1);
   					val[10].splice(x.selectedIndex,1);
   					if((y!="All") && (select[10] == 0))
   					{
   						x.remove(1);
   						val[10].splice(1,1);
   						key[10].splice(1,1);
   						select[10]=1;
   					}
					break;
				case "projects" :
					key[11].splice(x.selectedIndex,1);
   					val[11].splice(x.selectedIndex,1);
   					if((y!="All") && (select[10] == 0))
   					{
   						x.remove(1);
   						val[11].splice(1,1);
   						key[11].splice(1,1);
   						select[11]=1;
   					}
					break;
			}

		   x.remove(x.selectedIndex);
		   document.cookie ="cook ="+ both;
		   //alert(document.cookie);
		  // location.reload();
		}

		$(document).ready(function()
		{
			$("#myInput").on("keyup", function()
			{
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function()
				{
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});

function validateAddFaculty()
{
	var empflag=0;
	var pwdflag=0;
	var repwdflag=0;
	var privflag=0;
	var okay = false;
	var x = document.add_fac.empid.value;
	var c1 = document.getElementById("p1").checked;
	var c2 = document.getElementById("p2").checked;
	var c3 = document.getElementById("p3").checked;
	var c4 = document.getElementById("p4").checked;
  	var c5 = document.getElementById("p5").checked;

	document.add_fac.empid.style="";

  	document.getElementById("empid").innerHTML = "";
	document.getElementById("privelages").innerHTML = "";

	if (x == "" || x== null)
	{

    	empflag=1;
		document.getElementById("empid").innerHTML = "* Please Enter Employee Id";
		document.add_fac.empid.style = "border:2px solid red";
	}

	if(x.length != 6)
	{
		empflag=1;
		document.getElementById("empid").innerHTML = "* Please Enter 6-Digit Employee Id";
		document.add_fac.empid.style = "border:2px solid red";
	}

		if(c1 == false && c2 == false && c3 == false && c4 == false && c5 == false){
			document.getElementById("privelages").innerHTML = "* Please Select Atleast One Privelege";
			privflag=1;
		}
		 if(empflag==1	|| privflag==1)
		{
		return false;
		}
}



function validateReport()
{
	var a = document.getElementById("category").value;
	var y = document.getElementById("subcategory").value;
	document.getElementById("caterror").innerHTML = "";
	document.getElementById("category").style = "";
	document.getElementById("subcaterror").innerHTML = "";
	document.getElementById("subcategory").style = "";
	if(both=="")
	{
		if(a !="" && y == "")
		{
			document.getElementById("subcaterror").innerHTML = "* Please Select A Sub-Category";
			document.getElementById("subcategory").style = "border:2px solid red;";
			return false;
		}
		else if(a=="" && y=="")
		{
			document.getElementById("caterror").innerHTML = "* Please Select A Category";
			document.getElementById("category").style = "border:2px solid red;";
			document.getElementById("subcaterror").innerHTML = "* Please Select A Sub-Category";
			document.getElementById("subcategory").style = "border:2px solid red;";
			return false;
		}

    document.getElementById("subcaterror").innerHTML = "<br>* Please Add The Selected Values Before Submitting.";
    return false;
	}
	/*else if(a !="" && y == "")
	{
		document.getElementById("subcaterror").innerHTML = "Please Select A Sub-Category";
		document.getElementById("subcategory").style = "border:1px solid red;";
		return false;
	}*/
}

function validateGivePriv()
{
	var a = document.getElementById("privempid").value;
	//alert(a);
	document.getElementById("privempid").style = "";
	document.getElementById("emppriv").value = "";
	var flag = 0;

	if(a=="")
	{
		alert("* Please Enter The Employee ID You Want To Assign Your Profile Editing Rights To.");
		return false;
	}

	if(a.length != 6)
	{
		document.getElementById("privempid").style = "border:2px solid red;";
		document.getElementById("emppriv").innerHTML = "* Please Enter The Correct Employee Id.";
		flag = 1;
	}
  if(a.length != 6)
  document.getElementById("privempid").focus();
	if(flag==1)
		return false;
}
</script>

 <style>
	body
	{
	  position: relative;

	}

	ul.nav-pills
	{
	 	position: fixed;
	}

	#assprivs
		{
			background: none;
			border:none;
			outline:0;
			color : #337ab7;
		}

		#abc{
			color : #337ab7;
		}

	.navbar
	{
		border : none;
		background-color: #1F54AB;
		color:white;
		border-radius : 0px;
		width : 100%;
	}
	.navbar-collapse{
		color:white;
	}

	th, td {
	  padding: 25px;
	  text-align: center;
	}
  .cat
  	{
  		border : 1px solid black;
  		margin : 10px;
  		padding : 7px;
  		border-radius : 5px;
  	}

	.error
	{
		color  :red;
	}

  #setbtn
  {
    background-color : #1F54AB;
    margin-top:9px;
    border : none;
    font-size : 20px;
  }

  	#navleft
	{
		color : white;
		margin-top : 1%;
		font-size : 18px;
	}

::-webkit-scrollbar
		{
			width : 7px;
			height : 10px;
		}
		::-webkit-scrollbar-thumb
		{
		    background: #1F54AB;
		    border-radius : 30px;
		    width : 10px;
		}
		::-webkit-scrollbar-thumb:hover
		{
		    background: #1F54AB;
		    border-radius : 30px
		}

 </style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
  <?php include 'Decision1.php'; ?>
  <?php
  if(isset($_POST["assprivemp"]))
  	{
      $ar = $_POST["assprivemp"];
      if($ar == "ASSIGN"){
  		$newemp = $_POST["privemp"];
      $duration = $_POST["duration"];
  		$var = 0;
  		$sql = "SELECT Emp_Id FROM login";
  		$result = $conn->query($sql);
  		while($row = mysqli_fetch_assoc($result))
  		{
  			if($row["Emp_Id"] == $newemp)
  				$var = 1;
  		}
  		if($var==0)
  			{
          $errvar = "Please Enter A Valid User Id";
        }
      else {
        if($duration == "1Day"){
          $d=strtotime("+1 Days");
          $date =  date("Y-m-d", $d);
        }
        else if($duration == "2Days"){
          $d=strtotime("+2 Days");
          $date =  date("Y-m-d", $d);
        }
        if($duration == "3Days"){
          $d=strtotime("+3 Days");
          $date =  date("Y-m-d", $d);
        }
        if($duration == "1Week"){
          $d=strtotime("+7 Days");
          $date =  date("Y-m-d", $d);
        }
        $sql = "INSERT INTO edit VALUES($newemp,$eid,'$date')";
        $conn->query($sql);
        echo "<script type='text/javascript'>
            $(document).ready(function(){
            $('#myModal2').modal('show');
            });
            </script>";
            echo "<script>location.href='main.php#section24';</script>";
      }
  	 }
     else if($ar == "REVOKE")
     {
         $sql = "SELECT Emp1_Id FROM edit WHERE Emp2_Id=$eid";
         $result = $conn->query($sql);
         $row = mysqli_fetch_assoc($result);
         $idset = $row["Emp1_Id"];
         $sql = "DELETE FROM edit WHERE Emp1_Id=".$idset." AND Emp2_Id=".$eid."";
         $result = $conn->query($sql);
         $_SESSION["revokeid"] = $idset;
         echo "<script type='text/javascript'>
             $(document).ready(function(){
             $('#myModal3').modal('show');
             });
             </script>";
     }
   }


  if(isset($_POST["addmem_submit"]))
  	{
  		$empid = $_POST["empid"];
  		//$pwd = $_POST["storepass"];
  		$pwd = md5("Kjsce1234");

  		if(isset($_POST["p1"]))
  			$p1 = "TRUE";
  		else
  			$p1 = "FALSE";
  		if(isset($_POST["p2"]))
  			$p2 = "TRUE";
  		else
  			$p2 = "FALSE";
  		if(isset($_POST["p3"]))
  			$p3 = "TRUE";
  		else
  			$p3 = "FALSE";
  		if(isset($_POST["p4"]))
  			$p4 = "TRUE";
  		else
  			$p4 = "FALSE";
      	if(isset($_POST["p5"]))
    			$p5 = "TRUE";
  	  	else
  	  		$p5 = "FALSE";

  		$file = addslashes(file_get_contents('user.jpeg'));
  		$sql = "INSERT INTO login VALUES($empid,'$pwd','$p1','$p2','$p3','$p4','$p5','','')";
  		if($conn->query($sql))
  		{
  			$sql1="INSERT INTO academic_details VALUES ($empid,'',0.0,1950,null,'',0.0,1950,null,'','',1950,0.0,null,'',1950,0.0,'',null,'','',1950,0.0,null)";
  			$conn->query($sql1);
  			$sql1="INSERT INTO personal_details VALUES($empid,'','','','','1950-01-01','','1950-01-01',0,'$file','','1950-01-01','','1950-01-01','','1950-01-01','null')";
  			$conn->query($sql1);
        $_SESSION["newid"] = $empid;
        echo "<script type='text/javascript'>
            $(document).ready(function(){
            $('#myModal1').modal('show');
            });
            </script>";
            echo "<script>location.href='main.php#section22';</script>";
  		}
  		else{
  			$erradd = "* Member With This Id Already Exists";
  		}

  	}

   ?>
  <?php
  if(!isset($_SESSION["firstvisit"]))
  {
  $sql = "SELECT * FROM edit WHERE Emp1_Id=".$eid."";
  $result = $conn->query($sql);
  while($row = mysqli_fetch_assoc($result))
    {
    echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#myModal').modal('show');
        });
        </script>";
    //echo "<script type='text/javascript'>alert('Rights Present');</script>";
    }
    $_SESSION["firstvisit"] = 0;
  }
   ?>
	<!--NAVBAR-->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="nav navbar-nav navbar-left" id ="navleft">
				<b>Employee ID : <?php echo $empid; ?></b>
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id ="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li>
	          <div class="dropdown">
	            <button id ="setbtn" class="btn btn-primary" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span></button>
	            <ul class="dropdown-menu">
	              <li><a href="security.php"><font style="color:black;">Forgot Password</font></a></li>
	              <li class="divider"></li>
	              <li><a href="logout.php"><font style="color:black;">Log out &nbsp <span class="glyphicon glyphicon-log-in"></span></font></a></li>
	            </ul>
	          </div>
					</li>
				</ul>
			</div>
		</div>
	</nav>


	<nav class="col-sm-3 col-lg-3 col-md-4 col-xs-3" id ="myScrollspy">
	  <ul class="nav nav-pills nav-stacked" style="background-color: #F7F7F7; border-radius :7px; border:0.4px solid light-grey; padding:10px">
	  <li class="dropdown" id ="section0"><a href="profile.php"><center>PROFILE</center></a></li>
	  <hr>
		<li class="section21" id ="sectionW"><a href="#section21">Faculty List</a></li>
		<li class="section24" id ="sectionX"><a href="#section24">Assign Profile Editing Rights</a></li>
		<li class="section22" id ="sectionY"><a href="#section22">Add faculty</a></li>
		<li class="section23" id ="sectionZ"><a href="#section23">Report Generation</a></li>
	  </ul>
	</nav>

	<div class="container-fluid">
		<div class="col-sm-9 col-lg-9 col-md-8 col-xs-9">
			<div id ="section21" class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
				<legend><h1>Faculty List</h1></legend>
				<p>Select a faculty's name to see his/her details</p>
				<input class="form-control" id ="myInput" type="text" placeholder="Search..">
				<br>
				<table class="table table-bordered ">
					<thead>
					<tr>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Email</th>
					 </tr>
					</thead>
					<tbody id ='myTable'>
					<?php
						for($j=0;$j<$i;$j++)
						{
            				$myData = array('val'=>$id[$j]);
            				$arg = base64_encode( json_encode($myData) );
							echo "<tr>";
              if($right[$j] == 1) echo "<td><a href='list_profile.php?parameter=$arg'>$id[$j]</a>";
              else {
                echo "<td><a href='list_profile.php?parameter=$arg'>$id[$j]</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
              }
              if($right[$j] == 1) echo "&nbsp&nbsp&nbsp&nbsp&nbsp<a title='You Have To Fill Forms For This Employee' href='EditProfile.php?parameter=$arg'><span class='glyphicon glyphicon-edit' style='color:#337ab7;'>&nbsp</span></a>";
							echo "<td>";
							if($name[$j] == "")
								echo "-";
							else
								echo $name[$j];
							echo "</td>";
							echo "<td>";
							if($email[$j] == "")
								echo "-";
							else
								echo $email[$j];
							echo "</td>";
							if($eid==165000 or $eid==165001){
								echo "<td><span class='glyphicon glyphicon-trash' style='font-size:18px;color:red'></span></td></tr>";
							}
							else
								echo "</tr>";
						}
					?>
					</tbody>
				</table>
			</div>

      <div id ="section24" class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
				<legend><h1>Assign Profile Editing Rights : </h1></legend>
        <?php
          $sql = "SELECT * FROM edit WHERE Emp2_Id=$eid";
          $result = $conn->query($sql);
          if(mysqli_num_rows($result) > 0)
            {
              $row = mysqli_fetch_assoc($result);
              $idset = $row["Emp1_Id"];
              $date = $row["Date"];
              $today = date("Y-m-d");
              $ab=date_create($today);
        			$ba=date_create($date);
              if(date_diff($ab,$ba)->format('%d') == 0)
              {
                $from_time = strtotime(date("H:i:s"));
                $to_time = strtotime("23:59:59");
                $time_diff = $to_time - $from_time;
                //echo $time_diff;
                //echo gmdate('H', $time_diff);
                $timeleft = gmdate('H', $time_diff)." Hours";
                //echo date_diff($aba,$bab)->format('%h hours');
              }
              else {
                $timeleft = date_diff($ab,$ba)->format('%d Days');
              }
            }
            else {
              $idset = 0;
            }
        ?>
				<form name="givepro" action="main.php#section24" method="POST" onsubmit="return validateGivePriv()">
					<br>
          <?php
          if($idset == 0){
					echo '<div class="form-group">';
						echo '<label class="col-sm-3 col-md-3 col-lg-4 col-xs-0">Enter Employee ID : </label>';
						echo '<div class="col-md-9 col-sm-9 col-lg-6 col-xs-11">';
            if(!empty($errvar)){
							echo '<input type="text" style="border:2px solid red;" name="privemp" autofocus id ="privempid" class="form-control" />';
							echo '<span class="error" id ="emppriv">'.$errvar.'</span>';
            }
            else {
              echo '<input type="text" name="privemp" id ="privempid" class="form-control" />';
							echo '<span class="error" id ="emppriv"></span>';
            }
						echo '</div>';
					echo '</div>';
					echo '<br><br><br>';
          echo '<div class="form-group">';
          echo '<label class="col-sm-3 col-md-3 col-lg-4 col-xs-0">Duration : </label>';
          echo '<div class="col-md-9 col-sm-9 col-lg-6 col-xs-11">';
  						echo '<select class="form-control" name="duration">';
  							echo '<option value="1Day">1 Day</option>';
  							echo '<option value="2Days">2 Days</option>';
  							echo '<option value="3Days">3 Days</option>';
                echo '<option value="1Week">1 Week</option>';
  						echo '</select>';
  					echo '</div>';
  				echo '</div>';
          echo '<br><br><br>';
					echo '<div class="form-group">';
						echo '<center>';
						echo '<input type="submit" name="assprivemp" value="ASSIGN" class="btn btn-primary" />';
						echo '</center>';
					echo '</div>';
        }
        else {
          echo '<div class="form-group">';
						echo '<label class="col-sm-3 col-md-3 col-lg-4 col-xs-0">Rights Assigned To : </label>';
						echo '<div class="col-md-9 col-sm-9 col-lg-6 col-xs-11">';
							echo '<input type="text" name="privemp" id ="privempid" value="'.$idset.'" class="form-control" disabled="true"/>';
						echo '</div>';
					echo '</div>';
					echo '<br><br><br>';
          echo '<div class="form-group">';
          echo '<label class="col-sm-3 col-md-3 col-lg-4 col-xs-0">Duration Left : </label>';
          echo '<div class="col-md-9 col-sm-9 col-lg-6 col-xs-11">';
          echo '<input type="text" name="duration" id ="duration" value="'.$timeleft.'" class="form-control" disabled="true"/>';
          echo '</div>';
        echo '</div>';
        echo '<br><br><br>';
					echo '<div class="form-group">';
						echo '<center>';
						echo '<input type="submit" name="assprivemp" value="REVOKE" class="btn btn-primary" />';
						echo '</center>';
					echo '</div>';
        }
          ?>
				</form>
			</div>

			<div id ="section22" class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
				<legend><h1>Add Member</h1></legend>
				<form  action="main.php" name="add_fac" method="POST" onsubmit="return validateAddFaculty()">
					<div class="form-group">
            <?php
            if(!empty($erradd)){
						echo '<input type="text" class="form-control" style="border:2px solid red;" placeholder="Enter Employee ID" autofocus name="empid" >';
						echo '<span class="error" id ="empid">'.$erradd.'</span>';
          }
          else {
            echo '<input type="text" class="form-control" placeholder="Enter Employee ID" name="empid" >';
						echo '<span class="error" id ="empid"></span>';
          }
            ?>
					</div>
					<br>
					<p id ="assprivs" class="asspriv"><span id ="abc" class="glyphicon glyphicon-collapse-down"></span>&nbspAssign Privelege(s)</p>
					<div class="form-group" id ="privs">
						<input type="checkbox" name="p1" id ="p1" value="TRUE" class="checkbox-inline">Profile
						<input type="checkbox" name="p2" id ="p2" value="TRUE" class="checkbox-inline">View And Edit Privelages
						<input type="checkbox" name="p3" id ="p3" value="TRUE" class="checkbox-inline">Add Faculty
						<input type="checkbox" name="p4" id ="p4" value="TRUE" class="checkbox-inline">Report Generation
          				<input type="checkbox" name="p5" id ="p5" value="TRUE" class="checkbox-inline">Generate Faculty CV's
					</div>
					<span class="error" id ="privelages"></span>
        			<input type="hidden" id ="storepass" name="storepass">
					<div class="form-group">
						<center><input type="submit" class="btn btn-primary" name="addmem_submit" value="Submit"></center>
					</div>
				</form>
			</div>

        	<div id ="section23" class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
  				<legend><h1>Report Generation</h1></legend>
  				<form method="post" name="report" onsubmit="return validateReport()">
  				<fieldset>
  					<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
  						<div class="category_div" id ="category_div">
  							<div class="form-group">
  								<br>
  								<label class="radio-inline"><input type="radio" checked name="report_emp" onclick="var input = document.getElementById('name3'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">All Employee</label>
  								<label class="radio-inline"><input type="radio" name="report_emp" for="name3" onclick="var input = document.getElementById('name3'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}">Give Employee ID</label>
  								<input id ="name3" name="name3" type="text" disabled="true"/>
  							</div>
  							<div class="form-group">
  								<select  name="category" class="required-entry form-control" id ="category" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
  									<option value="">Select category</option>
  									<option class="catele" value="personal_details" label="Personal Details"></option>
  									<option class="catele" value="AQ" label="Academic Qualifications"></option>
  									<option class="catele" value="courses" label="Courses taught"></option>
  									<option class="catele" value="publication_books" label="Publication Books"></option>
  									<option class="catele" value="publication_journals" label="Publication Journals"></option>
  									<option class="catele" value="publication_conferences" label="Publication Conferences"></option>
  									<option class="catele" value="sttp_event_attended" label="STTP Attended"></option>
  									<option class="catele" value="sttp_event_organized" label="STTP Organised"></option>
  									<option class="catele" value="sttp_event_delivered" label="STTP Delivered"></option>
  									<option class="catele" value="co_curricular" label="Co-curricular"></option>
  									<option class="catele" value="extra" label="Extras"></option>
  									<option class="catele" value="projects" label="Projects Guided"></option>
  								</select>

  								<span class="error" id ="caterror"></span>
  							</div>
  						</div>

  						<br>
  						<div class="form-group">
  							<div class="sub_category_div" id ="sub_category_div">Please select attributes:
  								<script type="text/javascript" language="JavaScript">
  									document.write('<select class="form-control"  name="subcategory" id="subcategory"><option  value="" >Please select type of report</option></select>');
  								</script>
  								<noscript>
  									<select  name="subcategory" id ="subcategory">
  										<option value=""></option>
  									</select>
  								</noscript>
  								<span class="error" id ="subcaterror"></span>
  							</div>
  							<br>
  							<input type="button" onclick="removeOption()" value="Add">
  							<br><br>
  							<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
  								<div id ="cat"></div>
  							</div>
  						</div>
  					<hr>
  					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 form-group">
  						FROM:<input onfocus="(this.type='date')" class="form-control" onblur="(this.type='text')" id ="from" name="from">
  					</div>
  					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 form-group">
  						TO: <input onfocus="(this.type='date')"class="form-control"  onblur="(this.type='text')" id ="to" name="to">
  					</div>
  					<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 form-group">
  						<select  name="datecategory" class="required-entry form-control" id ="datecategory">
  							<option value="">Select Date Field</option>
  							<option class="datele" value="0" label="Personal Details - Date Of Birth"></option>
  							<option class="datele" value="1" label="Personal Details - Date Of Joining"></option>
  							<option class="datele" value="2" label="Personal Details - Promotion 1 Date"></option>
  							<option class="datele" value="3" label="Personal Details - Promotion 2 Date"></option>
  							<option class="datele" value="4" label="Personal Details - Promotion 3 Date"></option>
  							<option class="datele" value="5" label="Academic Details - SSC Passing Year"></option>
  							<option class="datele" value="6" label="Academic Details - HSC Passing Year"></option>
  							<option class="datele" value="7" label="Academic Details - Bachelors Passing Year"></option>
  							<option class="datele" value="8" label="Academic Details - Masters Passing Year"></option>
  							<option class="datele" value="9" label="Academic Details - Phd Passing Year"></option>
  							<option class="datele" value="10" label="Courses Taught - Year"></option>
  							<option class="datele" value="11" label="Publication Books - Date Published"></option>
  							<option class="datele" value="12" label="Publication Journals - Date Published"></option>
  							<option class="datele" value="13" label="Publication Conferences - Date Published"></option>
  							<option class="datele" value="14" label="STTP Events Attended - Date Of Event"></option>
  							<option class="datele" value="15" label="STTP Events Organized - Date Of Event"></option>
  							<option class="datele" value="16" label="STTP Events Delivered - Date Of Event"></option>
  							<option class="datele" value="17" label="Co Curricular Activites - Date"></option>
  							<option class="datele" value="18" label="Extra Curricular Activites - Date"></option>
  							<option class="datele" value="19" label="Projects Guided - Year"></option>
  						</select>
  						<br>
  						<span class="error" id ="date"></span>

  						<input type="button" onclick="addDate()" value="Add"><br>
  					</div>
  					<br>
  					<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
  						<div id ="datecat"></div>
  					</div>
  					<center><input type="submit" class="btn btn-primary" name = "ReportSubmit" value="Submit"></center>
  				</div>
  				</fieldset>
  				</form>
  			</div>
  		</div>
  	</div>
    <div class="modal fade" id ="myModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editing Rights</h4>
        </div>
        <div class="modal-body">
          <?php
          $sql = "SELECT * FROM edit WHERE Emp1_Id=".$eid."";
          $result = $conn->query($sql);
          echo "<ul>";
          while($row = mysqli_fetch_assoc($result))
            {
              echo "<li><b>Id : ".$row["Emp2_Id"]."</b> has given you form editing permission till <b>".$row["Date"]."</b>.</li>";
            }
            echo "</ul>";
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id ="myModal1" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New User</h4>
        </div>
        <div class="modal-body">
          <?php
          $id = $_SESSION["newid"];
          unset($_SESSION["newid"]);
          ?>
          <ul>
          <li>New User With <b>Id : <?php echo $id; ?> </b>Was Successfully Added.</li>
          <li>Temporary Password Assigned :<b> Kjsce1234 </b>.</li>
        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id ="myModal2" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profile Editing Rights</h4>
        </div>
        <div class="modal-body">
          <?php
          $sql = "SELECT * FROM edit WHERE Emp2_Id = $eid";
          $result = $conn->query($sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $id = $row["Emp1_Id"];
            $date = $row["Date"];
          }
          ?>
          You Have Assigned Your Profile Editing Rights To :<br>
        <ul>
          <li>User Id : &nbsp<b><?php echo $id; ?></b>.</li>
          <li>Duration : <b><?php echo $date; ?></b>.</li>
        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id ="myModal3" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profile Editing Rights</h4>
        </div>
        <?php
        $id = $_SESSION["revokeid"];
        unset($_SESSION["revokeid"]);
        ?>
        <div class="modal-body">
          You Have Revoked Your Profile Editing Rights From :<br>
        <ul>
          <li>User Id : &nbsp<b><?php echo $id; ?></b>.</li>
        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
  </body>
  </html>
