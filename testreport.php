<?php

include 'dbconnect.php';
if(!isset($_SESSION["Emp_Id"]))
  header('Location:logout.php');

  if($_COOKIE["cook"] == "")
  {
  	header('Location:main.php');
  }

$empid=$_SESSION["Emp_Id"];
$idgiven = 0;
$multiple=0;
$srno = 1;
$datapresent = 0;
$table = array(0,0,0,0,0,0,0,0,0,0,0,0);
$displayids = array();
$tablename=array();
$columnname=array();
$fromvalue=array();
$tovalue=array();
$datecol=array();
$abc = array();
$abc1 = array();



if(isset($_POST["back"]))
{
	setcookie("comb", "", time() - 3600);
	setcookie("cook", "", time() - 3600);
	setcookie("idgiven", "", time() - 3600);
	header('Location:main.php#section23');
}
if (isset($_COOKIE["cook"]))
	{
		$y = $_COOKIE["cook"];
     	$abc= explode(",",$_COOKIE["cook"]);
    }
if (isset($_COOKIE["id"]))
    {
       	$idgiven = 1;
       	$eid = $_COOKIE["id"];
    }

for($i=0;$i<sizeof($abc);$i++)
  {
    if($i%2==0)
    	array_push($tablename,$abc[$i]);
    else
    	array_push($columnname,$abc[$i]);
  }

if (isset($_COOKIE["comb"]))
	{
		$y = $_COOKIE["comb"];
	    $abc1= explode(",",$_COOKIE["comb"]);
	 }

for($i=0;$i<sizeof($abc1);$i++)
	 {
	   if($i%3==0)
	    array_push($fromvalue,$abc1[$i]);
	   else if($i%3==1)
	    array_push($tovalue,$abc1[$i]);
		 else
			array_push($datecol,$abc1[$i]);
			//echo $abc[$i];
	 }

	 for($i=0;$i<sizeof($tablename);$i++)
	 if($tablename[$i] != 'personal_details' && $tablename[$i] != 'AQ')
	 {
		 $multiple = 1;
		 break;
	 }

	 if($multiple == 0)
	 {
		 if($idgiven == 1)
		 $query = "SELECT Emp_Id FROM login WHERE Emp_Id=$eid";
		 else
		 $query = "SELECT Emp_Id FROM login";
		 $queryresult = $conn->query($query);
		 while($row = mysqli_fetch_assoc($queryresult))
		 {
			 $idde = $row["Emp_Id"];
			 array_push($displayids,$idde);
		 }
	 }

	 for($i=0;$i<sizeof($tablename);$i++)
 	{
 	  //echo $tablename[$i];
 	  //echo $columnname[$i];
 	  if($tablename[$i] == 'personal_details')
 	  {
			$col1 = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
 	    $table[0] = 1;
 	    if($columnname[$i] == 'All')
 	      for($j=0;$j<sizeof($col1);$j++)
 	        $col1[$j]=1;
 	    else if($columnname[$i] == 'Name')
 	      $col1[0]=1;
 	    else if($columnname[$i] == 'Email')
 	      $col1[1]=1;
 	    else if($columnname[$i] == 'Contact')
 	      $col1[2]=1;
 	    else if($columnname[$i] == 'DOB')
 	      $col1[3]=1;
 	    else if($columnname[$i] == 'Gender')
 	      $col1[4]=1;
 	    else if($columnname[$i] == 'Address')
 	      $col1[5]=1;
 	    else if($columnname[$i] == 'Join_Pos')
 	      $col1[6]=1;
 	    else if($columnname[$i] == 'Join_Date')
 	      $col1[7]=1;
 	    else if($columnname[$i] == 'Prom_1')
 	      $col1[8]=1;
 	    else if($columnname[$i] == 'Prom_1_Date')
 	      $col1[9]=1;
 	    else if($columnname[$i] == 'Prom_2')
 	      $col1[10]=1;
 	    else if($columnname[$i] == 'Prom_2_Date')
 	      $col1[11]=1;
 	    else if($columnname[$i] == 'Prom_3')
 	      $col1[12]=1;
 	    else if($columnname[$i] == 'Prom_3_Date')
 	      $col1[13]=1;
 	    else if($columnname[$i] == 'Years_Exp')
 	      $col1[14]=1;

 	  }

 	  if($tablename[$i] == 'AQ')
 	  {
			$col2 = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
 	    $table[1] = 1;
 	    if($columnname[$i] == 'All')
 	      for($j=0;$j<sizeof($col2);$j++)
 	        $col2[$j]=1;
 	    else if($columnname[$i] == 'SSC_Institute')
 	      $col2[0]=1;
 	    else if($columnname[$i] == 'SSC_Percentile')
 	      $col2[1]=1;
 	    else if($columnname[$i] == 'SSC_Year')
 	      $col2[2]=1;
 	    else if($columnname[$i] == 'HSC_Institute')
 	      $col2[3]=1;
 	    else if($columnname[$i] == 'HSC_Percentile')
 	      $col2[4]=1;
 	    else if($columnname[$i] == 'HSC_Year')
 	      $col2[5]=1;
 	    else if($columnname[$i] == 'Bachelors_In')
 	      $col2[6]=1;
 	    else if($columnname[$i] == 'Bachelors_Institute')
 	      $col2[7]=1;
 	    else if($columnname[$i] == 'Bachelors_Percentile')
 	      $col2[8]=1;
 	    else if($columnname[$i] == 'Bachelors_Year')
 	      $col2[9]=1;
 	    else if($columnname[$i] == 'Masters_In')
 	      $col2[10]=1;
 	    else if($columnname[$i] == 'Masters_Institute')
 	      $col2[11]=1;
 	    else if($columnname[$i] == 'Masters_Percentile')
 	      $col2[12]=1;
 	    else if($columnname[$i] == 'Masters_Year')
 	      $col2[13]=1;
 	    else if($columnname[$i] == 'Phd_In')
 	      $col2[14]=1;
 	    else if($columnname[$i] == 'Phd_Institute')
 	      $col2[15]=1;
 	    else if($columnname[$i] == 'Phd_Percentile')
 	      $col2[16]=1;
 	    else if($columnname[$i] == 'Phd_Year')
 	      $col2[17]=1;

 	  }

 	  if($tablename[$i] == 'courses')
 	  {
 			$col3 = array(0,0,0,0);
 	    $table[2] = 1;
 	    if($columnname[$i] == 'All')
 	      for($j=0;$j<sizeof($col3);$j++)
 	        $col3[$j]=1;
 	    else if($columnname[$i] == 'Category')
 	      $col3[0]=1;
 	    else if($columnname[$i] == 'Course_Id')
 	      $col3[1]=1;
 	    else if($columnname[$i] == 'Semester')
 	      $col3[2]=1;
 	    else if($columnname[$i] == 'Year')
 	      $col3[3]=1;
			if($idgiven == 1)
 			$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
			else
			$query = "SELECT Emp_Id from login";
 			$queryresult = $conn->query($query);
 			while($row = mysqli_fetch_assoc($queryresult))
 			{
				$continue = 1;
 				$idde = $row["Emp_Id"];
 				$queryagain = "SELECT * FROM courses WHERE Emp8_Id=$idde";
 				$queryagainresult = $conn->query($queryagain);
 				if(mysqli_num_rows($queryagainresult) > 0){
					while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
							array_push($displayids,$idde);
							$continue=0;
						}
					}
 				}
 	  	}

			if($tablename[$i] == 'publication_books')
		  {
				$col4 = array(0,0,0,0,0,0,0,0);
		    $table[3] = 1;
		    if($columnname[$i] == 'All')
		      for($j=0;$j<sizeof($col4);$j++)
		        $col4[$j]=1;
		    else if($columnname[$i] == 'Book_Name')
		      $col4[0]=1;
		    else if($columnname[$i] == 'ISBN')
		      $col4[1]=1;
		    else if($columnname[$i] == 'Publisher_Name')
		      $col4[2]=1;
		    else if($columnname[$i] == 'Date_Published')
		      $col4[3]=1;
		    else if($columnname[$i] == 'Author')
		      $col4[4]=1;
		    else if($columnname[$i] == 'Author_INST')
		      $col4[5]=1;
		    else if($columnname[$i] == 'Coauthors')
		      $col4[6]=1;
		    else if($columnname[$i] == 'Edition')
		      $col4[7]=1;

					if($idgiven == 1)
		 			$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
					else
					$query = "SELECT Emp_Id from login";
		 			$queryresult = $conn->query($query);
		 			while($row = mysqli_fetch_assoc($queryresult))
		 			{
						$continue = 1;
		 				$idde = $row["Emp_Id"];
		 				$queryagain = "SELECT * FROM publication_books WHERE Emp1_Id=$idde";
		 				$queryagainresult = $conn->query($queryagain);
		 				if(mysqli_num_rows($queryagainresult) > 0){
							while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
									array_push($displayids,$idde);
									$continue=0;
								}
							}
		 				}
		  }

			if($tablename[$i] == 'publication_journals')
		  {
				$col5 = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		    $table[4] = 1;
		    if($columnname[$i] == 'All')
		      for($j=0;$j<sizeof($col5);$j++)
		        $col5[$j]=1;
		    else if($columnname[$i] == 'Name')
		      $col5[0]=1;
		    else if($columnname[$i] == 'Author')
		      $col5[1]=1;
		    else if($columnname[$i] == 'Title')
		      $col5[2]=1;
		    else if($columnname[$i] == 'Date')
		      $col5[3]=1;
		    else if($columnname[$i] == 'Type')
		      $col5[4]=1;
		    else if($columnname[$i] == 'CoAuthors')
		      $col5[5]=1;
		    else if($columnname[$i] == 'BookChapter')
		      $col5[6]=1;
		    else if($columnname[$i] == 'PeerReviewed')
		      $col5[7]=1;
		    else if($columnname[$i] == 'ImpactFactor')
		      $col5[8]=1;
		    else if($columnname[$i] == 'PublisherName')
		      $col5[9]=1;
		    else if($columnname[$i] == 'DigitalObjectIdentifier')
		      $col5[10]=1;
		    else if($columnname[$i] == 'Volume')
		      $col5[11]=1;
		    else if($columnname[$i] == 'PageNumber')
		      $col5[12]=1;
		    else if($columnname[$i] == 'Issue')
		      $col5[13]=1;
		    else if($columnname[$i] == 'Citation')
		      $col5[14]=1;
		    else if($columnname[$i] == 'ISSN')
		      $col5[15]=1;
		    else if($columnname[$i] == 'Paid')
		      $col5[16]=1;
		    else if($columnname[$i] == 'SJR')
		      $col5[17]=1;

					if($idgiven == 1)
		 			$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
					else
					$query = "SELECT Emp_Id from login";
		 			$queryresult = $conn->query($query);
		 			while($row = mysqli_fetch_assoc($queryresult))
		 			{
						$continue = 1;
		 				$idde = $row["Emp_Id"];
		 				$queryagain = "SELECT * FROM publication_journals WHERE Emp4_Id=$idde";
		 				$queryagainresult = $conn->query($queryagain);
		 				if(mysqli_num_rows($queryagainresult) > 0){
							while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
									array_push($displayids,$idde);
									$continue=0;
								}
							}
		 				}
		  }


			if($tablename[$i] == 'publication_conferences')
		  {
				$col6 = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
				$table[5] = 1;
		    if($columnname[$i] == 'All')
		      for($j=0;$j<sizeof($col6);$j++)
		        $col6[$j]=1;
		    else if($columnname[$i] == 'Name')
		      $col6[0]=1;
		    else if($columnname[$i] == 'Place')
		      $col6[1]=1;
		    else if($columnname[$i] == 'Type')
		      $col6[2]=1;
		    else if($columnname[$i] == 'Date')
		      $col6[3]=1;
		    else if($columnname[$i] == 'Author')
		      $col6[4]=1;
		    else if($columnname[$i] == 'CoAuthors')
		      $col6[5]=1;
		    else if($columnname[$i] == 'H_Index')
		      $col6[6]=1;
		    else if($columnname[$i] == 'DOI')
		      $col6[7]=1;
		    else if($columnname[$i] == 'Pub_Name')
		      $col6[8]=1;
		    else if($columnname[$i] == 'Proc_Name')
		      $col6[9]=1;
		    else if($columnname[$i] == 'Peer')
		      $col6[10]=1;
		    else if($columnname[$i] == 'Theme')
		      $col6[11]=1;
		    else if($columnname[$i] == 'Paid')
		      $col6[12]=1;
		    else if($columnname[$i] == 'PageNo')
		      $col6[13]=1;
		    else if($columnname[$i] == 'ISSN')
		      $col6[14]=1;
		    else if($columnname[$i] == 'Organizer')
		      $col6[15]=1;
		    else if($columnname[$i] == 'Presented')
		      $col6[16]=1;
		    else if($columnname[$i] == 'Poster')
		      $col6[17]=1;
				else if($columnname[$i] == 'Web')
			    $col6[18]=1;
				else if($columnname[$i] == 'Citation_Index')
				  $col6[19]=1;

					if($idgiven == 1)
		 			$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
					else
					$query = "SELECT Emp_Id from login";
		 			$queryresult = $conn->query($query);
		 			while($row = mysqli_fetch_assoc($queryresult))
		 			{
						$continue = 1;
		 				$idde = $row["Emp_Id"];
		 				$queryagain = "SELECT * FROM publication_conferences WHERE Emp5_Id=$idde";
		 				$queryagainresult = $conn->query($queryagain);
		 				if(mysqli_num_rows($queryagainresult) > 0){
							while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
									array_push($displayids,$idde);
									$continue=0;
								}
							}
		 				}
		  }

			if($tablename[$i] == 'sttp_event_attended')
		  {
				$col7 = array(0,0,0,0,0,0,0,0,0);
		    $table[6] = 1;
		    if($columnname[$i] == 'All')
		      for($j=0;$j<sizeof($col7);$j++)
		        $col7[$j]=1;
		    else if($columnname[$i] == 'Title')
		      $col7[0]=1;
		    else if($columnname[$i] == 'Speaker')
		      $col7[1]=1;
		    else if($columnname[$i] == 'Organized_By')
		      $col7[2]=1;
		    else if($columnname[$i] == 'Event_Type')
		      $col7[3]=1;
		    else if($columnname[$i] == 'Place')
		      $col7[4]=1;
		    else if($columnname[$i] == 'Duration')
		      $col7[5]=1;
		    else if($columnname[$i] == 'Date_From')
		      $col7[6]=1;
		    else if($columnname[$i] == 'Date_To')
		      $col7[7]=1;
		    else if($columnname[$i] == 'Total_Participation')
		      $col7[8]=1;

					if($idgiven == 1)
					$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
					else
					$query = "SELECT Emp_Id from login";
					$queryresult = $conn->query($query);
					while($row = mysqli_fetch_assoc($queryresult))
					{
						$continue = 1;
						$idde = $row["Emp_Id"];
						$queryagain = "SELECT * FROM sttp_event_attended WHERE Emp6_Id=$idde";
						$queryagainresult = $conn->query($queryagain);
						if(mysqli_num_rows($queryagainresult) > 0){
							while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
									array_push($displayids,$idde);
									$continue=0;
								}
							}
						}

		  }

			if($tablename[$i] == 'sttp_event_organized')
		  {
				$col8 = array(0,0,0,0,0,0,0);
		    $table[7] = 1;
		    if($columnname[$i] == 'All')
		      for($j=0;$j<sizeof($col8);$j++)
		        $col8[$j]=1;
		    else if($columnname[$i] == 'Name')
		      $col8[0]=1;
		    else if($columnname[$i] == 'Type')
		      $col8[1]=1;
		    else if($columnname[$i] == 'Role')
		      $col8[2]=1;
		    else if($columnname[$i] == 'Place')
		      $col8[3]=1;
		    else if($columnname[$i] == 'Date_From')
		      $col8[4]=1;
		    else if($columnname[$i] == 'Date_To')
		      $col8[5]=1;
		    else if($columnname[$i] == 'Number_Participants')
		      $col8[6]=1;

					if($idgiven == 1)
					$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
					else
					$query = "SELECT Emp_Id from login";
					$queryresult = $conn->query($query);
					while($row = mysqli_fetch_assoc($queryresult))
					{
						$continue = 1;
						$idde = $row["Emp_Id"];
						$queryagain = "SELECT * FROM sttp_event_organized WHERE Emp7_Id=$idde";
						$queryagainresult = $conn->query($queryagain);
						if(mysqli_num_rows($queryagainresult) > 0){
							while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
									array_push($displayids,$idde);
									$continue=0;
								}
							}
						}

		  }

			if($tablename[$i] == 'sttp_event_delivered')
		  {
				$col9 = array(0,0,0,0,0,0,0);
		    $table[8] = 1;
		    if($columnname[$i] == 'All')
		      for($j=0;$j<sizeof($col9);$j++)
		        $col9[$j]=1;
		    else if($columnname[$i] == 'Name')
		      $col9[0]=1;
		    else if($columnname[$i] == 'Description')
		      $col9[1]=1;
		    else if($columnname[$i] == 'Event_Type')
		      $col9[2]=1;
		    else if($columnname[$i] == 'Duration')
		      $col9[3]=1;
		    else if($columnname[$i] == 'Place')
		      $col9[4]=1;
		    else if($columnname[$i] == 'Date_From')
		      $col9[5]=1;
		    else if($columnname[$i] == 'Date_To')
		      $col9[6]=1;

					if($idgiven == 1)
					$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
					else
					$query = "SELECT Emp_Id from login";
					$queryresult = $conn->query($query);
					while($row = mysqli_fetch_assoc($queryresult))
					{
						$continue = 1;
						$idde = $row["Emp_Id"];
						$queryagain = "SELECT * FROM sttp_event_delivered WHERE Emp9_Id=$idde";
						$queryagainresult = $conn->query($queryagain);
						if(mysqli_num_rows($queryagainresult) > 0){
							while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
									array_push($displayids,$idde);
									$continue=0;
								}
							}
						}
		  }


			if($tablename[$i] == 'co_curricular')
		  {
				$col10 = array(0,0,0,0,0);
		    $table[9] = 1;
		    if($columnname[$i] == 'All')
		      for($j=0;$j<sizeof($col10);$j++)
		        $col10[$j]=1;
		    else if($columnname[$i] == 'Name')
		      $col10[0]=1;
		    else if($columnname[$i] == 'Description')
		      $col10[1]=1;
		    else if($columnname[$i] == 'Type')
		      $col10[2]=1;
		    else if($columnname[$i] == 'Role')
		      $col10[3]=1;
		    else if($columnname[$i] == 'Date')
		      $col10[4]=1;

					if($idgiven == 1)
					$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
					else
					$query = "SELECT Emp_Id from login";
					$queryresult = $conn->query($query);
					while($row = mysqli_fetch_assoc($queryresult))
					{
						$continue = 1;
						$idde = $row["Emp_Id"];
						$queryagain = "SELECT * FROM co_curricular WHERE Emp10_Id=$idde";
						$queryagainresult = $conn->query($queryagain);
						if(mysqli_num_rows($queryagainresult) > 0){
							while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
									array_push($displayids,$idde);
									$continue=0;
								}
							}
						}
		  }



			if($tablename[$i] == 'extra')
		  {
				$col11 = array(0,0,0,0,0);
		    $table[10] = 1;
		    if($columnname[$i] == 'All')
		      for($j=0;$j<sizeof($col11);$j++)
		        $col11[$j]=1;
		    else if($columnname[$i] == 'Name')
		      $col11[0]=1;
		    else if($columnname[$i] == 'Description')
		      $col11[1]=1;
		    else if($columnname[$i] == 'Place')
		      $col11[2]=1;
		    else if($columnname[$i] == 'Role')
		      $col11[3]=1;
		    else if($columnname[$i] == 'Date')
		      $col11[4]=1;

					if($idgiven == 1)
					$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
					else
					$query = "SELECT Emp_Id from login";
					$queryresult = $conn->query($query);
					while($row = mysqli_fetch_assoc($queryresult))
					{
						$continue = 1;
						$idde = $row["Emp_Id"];
						$queryagain = "SELECT * FROM extra WHERE Emp11_Id=$idde";
						$queryagainresult = $conn->query($queryagain);
						if(mysqli_num_rows($queryagainresult) > 0){
							while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
									array_push($displayids,$idde);
									$continue=0;
								}
							}
						}
		  }

			if($tablename[$i] == 'projects')
		  {
				$col12 = array(0,0,0,0,0);
		    $table[11] = 1;
		    if($columnname[$i] == 'All')
		      for($j=0;$j<sizeof($col12);$j++)
		        $col12[$j]=1;
		    else if($columnname[$i] == 'Title')
		      $col12[0]=1;
		    else if($columnname[$i] == 'Description')
		      $col12[1]=1;
		    else if($columnname[$i] == 'Type')
		      $col12[2]=1;
		    else if($columnname[$i] == 'Year')
		      $col12[3]=1;
		    else if($columnname[$i] == 'StudentDetails')
		      $col12[4]=1;

					if($idgiven == 1)
					$query = "SELECT Emp_Id from login WHERE Emp_Id=$eid";
					else
					$query = "SELECT Emp_Id from login";
					$queryresult = $conn->query($query);
					while($row = mysqli_fetch_assoc($queryresult))
					{
						$continue = 1;
						$idde = $row["Emp_Id"];
						$queryagain = "SELECT * FROM projects WHERE Emp12_Id=$idde";
						$queryagainresult = $conn->query($queryagain);
						if(mysqli_num_rows($queryagainresult) > 0){
							while(($row1 = mysqli_fetch_assoc($queryagainresult)) && $continue==1 ){
									array_push($displayids,$idde);
									$continue=0;
								}
							}
						}
		  }
	}

	// for($i=0;$i<sizeof($displayids);$i++)
	// echo $displayids[$i];
	// echo "<br>";

if(sizeof($datecol) > 0){
	for($i=0;$i<sizeof($datecol);$i++)
	{
				if($datecol[$i] == 0)
				{
					//echo "erher";
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT DOB FROM personal_details WHERE Emp3_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["DOB"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				else if($datecol[$i] == 1)
				{
					//echo "jere1";
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Join_Date FROM personal_details WHERE Emp3_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["Join_Date"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}
				else if($datecol[$i] == 2)
				{
					//echo "jere";
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Prom_1_Date FROM personal_details WHERE Emp3_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["Prom_1_Date"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				else if($datecol[$i] == 3)
				{
					//echo "jere";
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Prom_2_Date FROM personal_details WHERE Emp3_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["Prom_2_Date"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}


				else if($datecol[$i] == 4)
				{
					//echo "jere";
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Prom_3_Date FROM personal_details WHERE Emp3_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["Prom_3_Date"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				if($datecol[$i] == 5)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT SSC_Year FROM academic_details WHERE Emp2_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = $row1["SSC_Year"];
							//echo $dv." ";
							$ab=(date_create($fromvalue[$i]))->format("Y");
							//echo $ab." ";
							$ba=(date_create($tovalue[$i]))->format("Y");
							//echo $ba." <br>";
							if(($ab>$dv)||($ba<$dv))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				if($datecol[$i] == 6)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT HSC_Year FROM academic_details WHERE Emp2_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = $row1["HSC_Year"];
							//echo $dv." ";
							$ab=(date_create($fromvalue[$i]))->format("Y");
							//echo $ab." ";
							$ba=(date_create($tovalue[$i]))->format("Y");
							//echo $ba." <br>";
							if(($ab>$dv)||($ba<$dv))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}
				if($datecol[$i] == 7)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Bachelors_Year FROM academic_details WHERE Emp2_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = $row1["Bachelors_Year"];
							//echo $dv." ";
							$ab=(date_create($fromvalue[$i]))->format("Y");
							//echo $ab." ";
							$ba=(date_create($tovalue[$i]))->format("Y");
							//echo $ba." <br>";
							if(($ab>$dv)||($ba<$dv))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}
				if($datecol[$i] == 8)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Masters_Year FROM academic_details WHERE Emp2_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = $row1["Masters_Year"];
							//echo $dv." ";
							$ab=(date_create($fromvalue[$i]))->format("Y");
							//echo $ab." ";
							$ba=(date_create($tovalue[$i]))->format("Y");
							//echo $ba." <br>";
							if(($ab>$dv)||($ba<$dv))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				if($datecol[$i] == 9)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Phd_Year FROM academic_details WHERE Emp2_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = $row1["Phd_Year"];
							//echo $dv." ";
							$ab=(date_create($fromvalue[$i]))->format("Y");
							//echo $ab." ";
							$ba=(date_create($tovalue[$i]))->format("Y");
							//echo $ba." <br>";
							if(($ab>$dv)||($ba<$dv))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

			}

			// for($i=0;$i<sizeof($displayids);$i++)
			// echo $displayids[$i];
			// echo "<br>";

			for($i=0;$i<sizeof($datecol);$i++)
			{
				if($datecol[$i] == 10)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Year FROM courses WHERE Emp8_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = $row1["Year"];
							//echo $dv." ";
							$ab=(date_create($fromvalue[$i]))->format("Y");
							//echo $ab." ";
							$ba=(date_create($tovalue[$i]))->format("Y");
							//echo $ba." <br>";
							if(($ab>$dv)||($ba<$dv))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				if($datecol[$i] == 11)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Date_Published FROM publication_books WHERE Emp1_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["Date_Published"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				if($datecol[$i] == 12)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						echo $displayids[$j]." ";
						$query = "SELECT Date FROM publication_journals WHERE Emp4_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["Date"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				if($datecol[$i] == 13)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Date FROM publication_conferences WHERE Emp5_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["Date"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				if($datecol[$i] == 14)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT * FROM sttp_event_attended WHERE Emp6_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
						 $dv1 = date_create($row1["Date_From"]);
 						 $dv2 = date_create($row1["Date_To"]);
 						 //echo $dv;
 						 $ab=date_create($fromvalue[$i]);
 						 $ba=date_create($tovalue[$i]);

 						 $diff=date_diff($ab,$dv1);
  					 $diff1=date_diff($dv1,$ba);
 						 $diff2=date_diff($ab,$dv2);
 						 $diff3=date_diff($dv2,$ba);

  					if(($diff->format("%R")=='-')||($diff1->format("%R")=='-')||($diff2->format("%R")=='-')||($diff3->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}


				if($datecol[$i] == 15)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT * FROM sttp_event_organized WHERE Emp7_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
						 $dv1 = date_create($row1["Date_From"]);
 						 $dv2 = date_create($row1["Date_To"]);
 						 //echo $dv;
 						 $ab=date_create($fromvalue[$i]);
 						 $ba=date_create($tovalue[$i]);

 						 $diff=date_diff($ab,$dv1);
  					 $diff1=date_diff($dv1,$ba);
 						 $diff2=date_diff($ab,$dv2);
 						 $diff3=date_diff($dv2,$ba);

  					if(($diff->format("%R")=='-')||($diff1->format("%R")=='-')||($diff2->format("%R")=='-')||($diff3->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}



				if($datecol[$i] == 16)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT * FROM sttp_event_delivered WHERE Emp9_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
						 $dv1 = date_create($row1["Date_From"]);
 						 $dv2 = date_create($row1["Date_To"]);
 						 //echo $dv;
 						 $ab=date_create($fromvalue[$i]);
 						 $ba=date_create($tovalue[$i]);

 						 $diff=date_diff($ab,$dv1);
  					 $diff1=date_diff($dv1,$ba);
 						 $diff2=date_diff($ab,$dv2);
 						 $diff3=date_diff($dv2,$ba);

  					if(($diff->format("%R")=='-')||($diff1->format("%R")=='-')||($diff2->format("%R")=='-')||($diff3->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}


				if($datecol[$i] == 17)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Date FROM co_curricular WHERE Emp10_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["Date"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

				if($datecol[$i] == 18)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Date FROM extra WHERE Emp11_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = date_create($row1["Date"]);
							//echo $dv." ";
							$ab=date_create($fromvalue[$i]);
							//echo $ab." ";
							$ba=date_create($tovalue[$i]);
							//echo $ba." <br>";
							$diff=date_diff($ab,$dv);
							$diff1=date_diff($dv,$ba);

							if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}



				if($datecol[$i] == 19)
				{
					$temp = array();
					for($j = 0 ; $j < sizeof($displayids); $j++){
						$error = array();
						$noset = 0;
						//echo $displayids[$j]." ";
						$query = "SELECT Year FROM projects WHERE Emp12_Id=".$displayids[$j]."";
						$queryresult = $conn->query($query);
						while($row1 = mysqli_fetch_assoc($queryresult)){
							$dv = $row1["Year"];
							//echo $dv." ";
							$ab=(date_create($fromvalue[$i]))->format("Y");
							//echo $ab." ";
							$ba=(date_create($tovalue[$i]))->format("Y");
							//echo $ba." <br>";
							if(($ab>$dv)||($ba<$dv))
								array_push($error,-1);
							else
								array_push($error,1);
						}
						for($k=0;$k<sizeof($error);$k++){
							//echo $error[$k]." ";
							if($error[$k] == 1){
								$noset = 1;
								break;
							}
						}
						//echo "<br>";
						if($noset == 1){
								array_push($temp,$displayids[$j]);
							}
					}
					$displayids = array_unique($temp);
				}

			}
		}

	//echo "down";
	//for($i=0;$i<sizeof($temp);$i++)
	//echo $temp[$i];
	//echo "<br>";\
	$displayids = array_unique($displayids);
	// for($i=0;$i<sizeof($displayids);$i++)
	// echo $displayids[$i];
	// echo "<br>";

	for($i=0;$i<sizeof($table);$i++)
	{
		if($table[$i] == 1)
		{
			$datapresent = 1;
			break;
		}
	}
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=NTR' rel='stylesheet'>
<style>
body, table
{
	font-size : 15px;
}

th, td {
  padding: 25px;
  text-align: center;
}

#excelbtn
{
  outline : 0;
}

#a{text-align : center;}
#b
{
	margin-right : 10px;
	margin-top : 5px;
	background-color : #1F54AB;
	color : white;
}

#height
{
	color : blue;
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

		#but{
		  background-color: #1F54AB;
		  border:none;
		  margin-top: 10px;
		}

		#navleft
		{
			color : white;
			margin-top : 1%;
			font-size : 18px;
		}

		.navbar
		{
			border : none;
			background-color: #1F54AB;

			border-radius : 0px;
			width : 100%;
		}

		#but
		{
		  background-color: #1F54AB;
		  border:none;
		  margin-top: 7px;
		  outline : 0;
		  font-size : 20px;
		}

</style>

<script>

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
</script>
</head>
<body>
	<!--NAVBAR-->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid" style="width:100%;">
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
						<button id ="b" class="btn btn-default"id ="excelbtn" <?php if(!(($datapresent == 1) && (sizeof($displayids) > 0))) echo 'disabled="true" title="This Function Is Not Available At This Moment"'; ?> onclick="exportTableToExcel('tblData', 'Report')"><b>Export To Excel &nbsp<i class="fa fa-file-excel-o" style="font-size:20px;color:#4DEB10"></i></b></button>
					</li>
					<li>
						<div class="dropdown">
							<button id ="but" class="btn btn-primary" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span></button>
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



	<!-- MAIN-TABLE -->
	<div class="col-sm-12 col-md-12 col-lg-12 col-xs-9">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
			<a href = "main.php#section23" title="Obviously not Simon! :P">
				<font size="4"><span class="glyphicon glyphicon-arrow-left"></span>&nbspGo Back</font>
			</a>
		</div>
      	<h1 id ="a">Report Page</h1>
      	<hr>

<?php
if(($datapresent == 1) && (sizeof($displayids) > 0)){
echo "<div class='table-responsive col-sm-12 col-md-12 col-lg-12 col-xs-12 '>";
	echo '<table id="tblData" class="table table-bordered tblcolor">';
		echo '<tr>';
		echo '<th>Sr No.</th>';
		echo '<th>Employee Id</th>';

		if($table[0] == 1){

			if($col1[0] == 1) echo '<th>Name</th>';
			if($col1[1] == 1) echo '<th>Email</th>';
			if($col1[2] == 1) echo '<th>Contact</th>';
			if($col1[3] == 1) echo '<th>Date Of Birth</th>';
			if($col1[4] == 1) echo '<th>Gender</th>';
			if($col1[5] == 1) echo '<th>Address </th>';
			if($col1[6] == 1) echo '<th>Joining Position</th>';
			if($col1[7] == 1) echo '<th>Joining Date</th>';
			if($col1[8] == 1) echo '<th>Promotion 1</th>';
			if($col1[9] == 1) echo '<th>Promotion 1 Date</th>';
			if($col1[10] == 1) echo '<th>Promotion 2</th>';
			if($col1[11] == 1) echo '<th>Promotion 2 Date</th>';
			if($col1[12] == 1) echo '<th>Promotion 3</th>';
			if($col1[13] == 1) echo '<th>Promotion 3 Date</th>';
			if($col1[14] == 1) echo '<th>Years Of Experience</th>';
		}

		if($table[1] == 1){

			if($col2[0] == 1) echo '<th>SSC Institute</th>';
			if($col2[1] == 1) echo '<th>SSC Percentile/CGPA</th>';
			if($col2[2] == 1) echo '<th>SSC Year Of Passing</th>';
			if($col2[3] == 1) echo '<th>HSC Institute</th>';
			if($col2[4] == 1) echo '<th>HSC Percentile/CGPA</th>';
			if($col2[5] == 1) echo '<th>HSC Year Of Passing</th>';
			if($col2[6] == 1) echo '<th>Bachelors Degree</th>';
			if($col2[7] == 1) echo '<th>Bachelors Institute</th>';
			if($col2[8] == 1) echo '<th>Bachelors Percentile/CGPA</th>';
			if($col2[9] == 1) echo '<th>Bachelors Year Of Passing</th>';
			if($col2[10] == 1) echo '<th>Masters Degree</th>';
			if($col2[11] == 1) echo '<th>Masters Institute</th>';
			if($col2[12] == 1) echo '<th>Masters Percentile/CGPA</th>';
			if($col2[13] == 1) echo '<th>Masters Year Of Passing</th>';
			if($col2[14] == 1) echo '<th>Phd Degree</th>';
			if($col2[15] == 1) echo '<th>Phd Institute</th>';
			if($col2[16] == 1) echo '<th>Phd Percentile/CGPA</th>';
			if($col2[17] == 1) echo '<th>Phd Year Of Passing</th>';

		}

		if($table[2] == 1){

			echo '<th>Courses Tought</th>';

		}

		if($table[3] == 1){

			echo '<th>Publication Books</th>';

		}

		if($table[4] == 1){

			echo '<th>Publication Journals</th>';

		}

		if($table[5] == 1){

			echo '<th>Publication Conferences</th>';

		}

		if($table[6] == 1){

			echo '<th>STTP Events Attended</th>';

		}

		if($table[7] == 1){

			echo '<th>STTP Events Organized</th>';

		}

		if($table[8] == 1){

			echo '<th>STTP Events Delivered</th>';

		}

		if($table[9] == 1){

			echo '<th>Co Curricular Activities</th>';

		}

		if($table[10] == 1){

			echo '<th>Extra Curricular Activities</th>';

		}

		if($table[11] == 1){

			echo '<th>Projects Guided</th>';

		}

		echo '</tr>';
		for($u=0;$u<sizeof($displayids);$u++){
			$emp = $displayids[$u];
			$showdata = 1;
			for($i=0;$i<sizeof($datecol);$i++)
			{
				//echo $datecol[$i];
				//echo $fromvalue[$i]." ".$tovalue[$i]." ".$datecol[$i]."<br>";

				if($datecol[$i] == 2)
				{
					$s = "SELECT Prom_1_Date FROM personal_details WHERE Emp3_Id=$emp";
					$r = $conn->query($s);
					$ro = mysqli_fetch_assoc($r);
					$dv = $ro["Prom_1_Date"];
					$ab=date_create($fromvalue[$i]);
					$ba=date_create($tovalue[$i]);
					$dv=date_create($dv);
					$diff=date_diff($ab,$dv);
					$diff1=date_diff($dv,$ba);
					if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
						$showdata = -1;
				}

				if($datecol[$i] == 3)
				{
					$s = "SELECT Prom_2_Date FROM personal_details WHERE Emp3_Id=$emp";
					$r = $conn->query($s);
					$ro = mysqli_fetch_assoc($r);
					$dv = $ro["Prom_2_Date"];
					$ab=date_create($fromvalue[$i]);
					$ba=date_create($tovalue[$i]);
					$dv=date_create($dv);
					$diff=date_diff($ab,$dv);
					$diff1=date_diff($dv,$ba);
					if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
						$showdata = -1;
				}

				if($datecol[$i] == 4)
				{
					$s = "SELECT Prom_3_Date FROM personal_details WHERE Emp3_Id=$emp";
					$r = $conn->query($s);
					$ro = mysqli_fetch_assoc($r);
					$dv = $ro["Prom_3_Date"];
					$ab=date_create($fromvalue[$i]);
					$ba=date_create($tovalue[$i]);
					$dv=date_create($dv);
					$diff=date_diff($ab,$dv);
					$diff1=date_diff($dv,$ba);
					if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
						$showdata = -1;
				}
				if($datecol[$i] == 5)
				{
					$s = "SELECT SSC_Year FROM academic_details	WHERE Emp2_Id=$emp";
					$r = $conn->query($s);
					$ro = mysqli_fetch_assoc($r);
					$dv = $ro["SSC_Year"];
					$ab=(date_create($fromvalue[$i]))->format("Y");
					$ba=(date_create($tovalue[$i]))->format("Y");
					if(($ab>$dv)||($ba<$dv))
						$showdata = -1;
				}
				if($datecol[$i] == 6)
				{
					$s = "SELECT HSC_Year FROM academic_details	 WHERE Emp2_Id=$emp";
					$r = $conn->query($s);
					$ro = mysqli_fetch_assoc($r);
					$dv = $ro["HSC_Year"];
					$ab=(date_create($fromvalue[$i]))->format("Y");
					$ba=(date_create($tovalue[$i]))->format("Y");
					if(($ab>$dv)||($ba<$dv))
						$showdata = -1;
				}
				if($datecol[$i] == 7)
				{
					$s = "SELECT Bachelors_Year FROM academic_details	 WHERE Emp2_Id=$emp";
					$r = $conn->query($s);
					$ro = mysqli_fetch_assoc($r);
					$dv = $ro["Bachelors_Year"];
					$ab=(date_create($fromvalue[$i]))->format("Y");
					$ba=(date_create($tovalue[$i]))->format("Y");
					if(($ab>$dv)||($ba<$dv))
						$showdata = -1;
				}
				if($datecol[$i] == 8)
				{
					$s = "SELECT Masters_Year FROM academic_details	 WHERE Emp2_Id=$emp";
					$r = $conn->query($s);
					$ro = mysqli_fetch_assoc($r);
					$dv = $ro["Masters_Year"];
					$ab=(date_create($fromvalue[$i]))->format("Y");
					$ba=(date_create($tovalue[$i]))->format("Y");
					if(($ab>$dv)||($ba<$dv))
						$showdata = -1;
				}
				if($datecol[$i] == 9)
				{
					$s = "SELECT Phd_Year FROM academic_details	 WHERE Emp2_Id=$emp";
					$r = $conn->query($s);
					$ro = mysqli_fetch_assoc($r);
					$dv = $ro["Phd_Year"];
					$ab=(date_create($fromvalue[$i]))->format("Y");
					$ba=(date_create($tovalue[$i]))->format("Y");
					if(($ab>$dv)||($ba<$dv))
						$showdata = -1;
				}
			}
			if($showdata == 1){

        $sql1 = "SELECT * FROM personal_details WHERE Emp3_Id=$emp";
				$result1 = $conn->query($sql1);
				$row1 = mysqli_fetch_assoc($result1);
        if(!($row1["Name"] == '')){
			  echo "<tr>";
				echo "<td>".$srno."</td>";
				echo "<td>".$emp."</td>";

			if($table[0] == 1){

				$sql1 = "SELECT * FROM personal_details WHERE Emp3_Id=$emp";
				$result1 = $conn->query($sql1);
				$row1 = mysqli_fetch_assoc($result1);
					if($col1[0] == 1)
					{
						if($row1["Name"] == '')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Name"]."</td>";
					 }
					if($col1[1] == 1)
					{
						if($row1["Email"] == '')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Email"]."</td>";
					 }
					if($col1[2] == 1)
					{
						if($row1["Contact"] == '')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Contact"]."</td>";
					 }
					if($col1[3] == 1)
					 {
						 if($row1["DOB"] == '1950-01-01')
							echo "<td> - </td>";
						 else
							echo "<td>".$row1["DOB"]."</td>";
						}
					if($col1[4] == 1)
					{
						if($row1["gender"] == 'null')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["gender"]."</td>";
					 }
					if($col1[5] == 1)
					{
						if($row1["Address"] == '')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Address"]."</td>";
					 }
					if($col1[6] == 1)
					{
						if($row1["Join_Pos"] == '')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Join_Pos"]."</td>";
					 }
					if($col1[7] == 1)
					{
						if($row1["Join_Date"] == '1950-01-01')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Join_Date"]."</td>";
					 }
					if($col1[8] == 1)
					{
						if($row1["Prom_1"] == '')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Prom_1"]."</td>";
					 }
					if($col1[9] == 1)
					{
						if($row1["Prom_1_Date"] == '1950-01-01')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Prom_1_Date"]."</td>";
					 }
					if($col1[10] == 1)
					{
						if($row1["Prom_2"] == '')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Prom_2"]."</td>";
					 }
					if($col1[11] == 1)
					{
						if($row1["Prom_2_Date"] == '1950-01-01')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Prom_2_Date"]."</td>";
					 }
					if($col1[12] == 1)
					{
						if($row1["Prom_3"] == '')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Prom_3"]."</td>";
					 }
					if($col1[13] == 1)
					{
						if($row1["Prom_3_Date"] == '1950-01-01')
						 echo "<td> - </td>";
						else
						 echo "<td>".$row1["Prom_3_Date"]."</td>";
					 }
					if($col1[14] == 1)
					{
						if($row1["Years_Exp"] < 0)
						 echo "<td> 0	 </td>";
						else
						 echo "<td>".$row1["Years_Exp"]."</td>";
					 }
			}

			if($table[1] == 1){

				$sql2 = "SELECT * FROM academic_details WHERE Emp2_Id=$emp";
				$result2 = $conn->query($sql2);
				$row2 = mysqli_fetch_assoc($result2);

				if($col2[0] == 1)
				{
					if($row2["SSC_Institute"] ==  '')
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["SSC_Institute"]."</td>";
				 }
				if($col2[1] == 1)
				{
					if($row2["SSC_Percentile"] ==  0.00)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["SSC_Percentile"]."</td>";
				 }
				if($col2[2] == 1)
				{
					if($row2["SSC_Year"] ==  1950)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["SSC_Year"]."</td>";
				 }
				if($col2[3] == 1)
				{
					if($row2["HSC_Institute"] ==  '')
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["HSC_Institute"]."</td>";
				 }
				if($col2[4] == 1)
				{
					if($row2["HSC_Percentile"] ==  0.00)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["HSC_Percentile"]."</td>";
				 }
				if($col2[5] == 1)
				{
					if($row2["HSC_Year"] ==  1950)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["HSC_Year"]."</td>";
				 }
				if($col2[6] == 1)
				{
					if($row2["Bachelors_In"] ==  '')
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Bachelors_In"]."</td>";
				 }
				if($col2[7] == 1)
				{
					if($row2["Bachelors_Institute"] ==  '')
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Bachelors_Institute"]."</td>";
				 }
				if($col2[8] == 1)
				{
					if($row2["Bachelors_Percentile"] ==  0.00)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Bachelors_Percentile"]."</td>";
				 }
				if($col2[9] == 1)
				{
					if($row2["Bachelors_Year"] ==  1950)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Bachelors_Year"]."</td>";
				 }
				if($col2[10] == 1)
				{
					if($row2["Masters_In"] ==  '')
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Masters_In"]."</td>";
				 }
				if($col2[11] == 1)
				{
					if($row2["Masters_Institute"] ==  '')
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Masters_Institute"]."</td>";
				 }
				if($col2[12] == 1)
				{
					if($row2["Masters_Percentile"] ==  0.00)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Masters_Percentile"]."</td>";
				 }
				if($col2[13] == 1)
				{
					if($row2["Masters_Year"] ==  1950)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Masters_Year"]."</td>";
				 }
				if($col2[14] == 1)
				{
					if($row2["Phd_In"] ==  '')
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Phd_In"]."</td>";
				 }
				if($col2[15] == 1)
				{
					if($row2["Phd_Institute"] ==  '')
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Phd_Institute"]."</td>";
				 }
				if($col2[16] == 1)
				{
					if($row2["Phd_Percentile"] ==  0.00)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Phd_Percentile"]."</td>";
				 }
				if($col2[17] == 1)
				{
					if($row2["Phd_Year"] ==  1950)
					 echo "<td> - </td>";
					else
					 echo "<td>".$row2["Phd_Year"]."</td>";
				 }

			}

			if($table[2] == 1){
				$somevalue = 0;
				$a = 1;
				echo '<td>';

					$sql3="SELECT * from courses where Emp8_Id=$emp";
					$result3=$conn->query($sql3);

					if(mysqli_num_rows($result3) > 0){
						echo "<div class='table-responsive '>";
						echo '<table class="table table-bordered" >';

					echo '<tr>';
					echo '<th>Sr no.</th>';
					if($col3[0] == 1) echo '<th>Course Category</th>';
					if($col3[1] == 1) echo '<th>Course Id</th>';
					if($col3[2] == 1) echo '<th>Course Year</th>';
					if($col3[3] == 1) echo '<th>Course Semester</th>';
					echo '</tr>';

					while($row3 = mysqli_fetch_assoc($result3))
					{
						$show1 = 1;
						for($i=0;$i<sizeof($datecol);$i++)
						if($datecol[$i] == 10)
						{
							$dv = $row3["Year"];
							//echo $dv;
							$ab=(date_create($fromvalue[$i]))->format("Y");
							$ba=(date_create($tovalue[$i]))->format("Y");
							if(($ab>$dv)||($ba<$dv))
								$show1 = -1;
						}
						if($show1 == 1){
							$somevalue = 1;
						echo '<tr>';
						echo '<td>'.$a.'</td>';
						if($col3[0] == 1)
						{
							if($row3["Category"] ==  '')
							 echo "<td> - </td>";
							else
							 echo "<td>".$row3["Category"]."</td>";
						 }
						if($col3[1] == 1)
						{
							if($row3["Course_Id"] ==  '')
							 echo "<td> - </td>";
							else
							 echo "<td>".$row3["Course_Id"]."</td>";
						 }
						if($col3[2] == 1)
						{
							if($row3["Year"] ==  '')
							 echo "<td> - </td>";
							else
							 echo "<td>".$row3["Year"]."</td>";
						 }
						if($col3[3] == 1)
						{
							if($row3["Semester"] ==  '')
							 echo "<td> - </td>";
							else
							 echo "<td>".$row3["Semester"]."</td>";
						 }
						echo '</tr>';
						$a++;
					}
				}
				if($somevalue == 0)
					echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
				echo '</table>';
				echo '</div>';
			}
			else {
				echo 'No Data Available';
			}
				echo "</td>";
		}

	 if($table[3] == 1){
		 $somevalue = 0;
		 $b = 1;
		 echo '<td>';

			 $sql4="SELECT * from publication_books where Emp1_Id=$emp";
			 $result4=$conn->query($sql4);

			 if(mysqli_num_rows($result4) > 0){
				 echo "<div class='table-responsive '>";
				 echo '<table class="table table-bordered" >';

			 echo '<tr>';
			 echo '<th>Sr no.</th>';

			 if($col4[0] == 1) echo "<th>Book Name</th>";
			 if($col4[1] == 1) echo "<th>ISBN</th>";
			 if($col4[2] == 1) echo "<th>Published By</th>";
			 if($col4[3] == 1) echo "<th>Date Published</th>";
			 if($col4[4] == 1) echo "<th>Author</th>";
			 if($col4[5] == 1) echo "<th>Author Institute</th>";
			 if($col4[6] == 1) echo "<th>Co-Authors</th>";
			 if($col4[7] == 1) echo "<th>Edition</th>";
			 echo '</tr>';

			 while($row4 = mysqli_fetch_assoc($result4))
			 {
				 $show2 = 1;
				 for($i=0;$i<sizeof($datecol);$i++)
				 if($datecol[$i] == 11)
				 {
					 $dv = $row4["Date_Published"];
					 //echo $dv;
					 $ab=date_create($fromvalue[$i]);
					 $ba=date_create($tovalue[$i]);
					 $dv=date_create($dv);
					 $diff=date_diff($ab,$dv);
					 $diff1=date_diff($dv,$ba);
					 if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
						 $show2 = -1;
				 }
				 if($show2 == 1){
					 $somevalue = 1;
				 echo '<tr>';
				 echo '<td>'.$b.'</td>';
				 if($col4[0] == 1)
				 {
					 if($row4["Book_Name"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row4["Book_Name"]."</td>";
					}
				 if($col4[1] == 1)
				 {
					 if($row4["ISBN"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row4["ISBN"]."</td>";
					}
				 if($col4[2] == 1)
				 {
					 if($row4["Publisher_Name"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row4["Publisher_Name"]."</td>";
					}
				 if($col4[3] == 1)
				 {
					 if($row4["Date_Published"] ==  '1950-01-01')
						echo "<td> - </td>";
					 else
						echo "<td>".$row4["Date_Published"]."</td>";
					}
				 if($col4[4] == 1)
				 {
					 if($row4["Author"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row4["Author"]."</td>";
					}
				 if($col4[5] == 1)
				 {
					 if($row4["Author_INST"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row4["Author_INST"]."</td>";
					}
				 if($col4[6] == 1)
				 {
					 echo '<td>';
					 if( ($row4["COA1"] == "") && ($row4["COA2"] == "") && ($row4["COA3"] == "") )
						echo "Data Not Available";
						else {
							echo "<div class='table-responsive '>";
							echo '<table class="table table-bordered" >';

							echo '<tr>';
							echo '<th>Sr no.</th>';
							echo '<th>Name</th>';
							echo '<th>Institute</th>';
							echo '</tr>';
							if($row4["COA1"] != ""){
								echo '<tr><td>1</td><td>'.$row4["COA1"].'</td>';
								if($row4["COA1_INST"] ==  '')
								echo "<td> - </td>";
								else
								echo "<td>".$row4["COA1_INST"]."</td>";
								echo '</tr>';
							}
							if($row4["COA2"] != ""){
								echo '<tr><td>1</td><td>'.$row4["COA2"].'</td>';
								if($row4["COA2_INST"] ==  '')
								echo "<td> - </td>";
								else
								echo "<td>".$row4["COA2_INST"]."</td>";
								echo '</tr>';
							}
							if($row4["COA3"] != ""){
								echo '<tr><td>1</td><td>'.$row4["COA3"].'</td>';
								if($row4["COA3_INST"] ==  '')
								echo "<td> - </td>";
								else
								echo "<td>".$row4["COA3_INST"]."</td>";
								echo '</tr>';
							}
							echo '</table>';
							echo '</div>';
						}
					 echo '</td>';
				 }
				 if($col4[7] == 1)
				 {
					 if($row4["Edition"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row4["Edition"]."</td>";
					}
				 echo '</tr>';
				 $b++;
			 }
		 }
		 if($somevalue == 0)
			echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
			 echo '</table>';
			 echo '</div>';
		 }
		 else {
			 echo 'No Data Available';
		 }
		 echo "</td>";
	 }

	 if($table[4] == 1){
		 $somevalue = 0;
		 $c = 1;
		 echo '<td>';

			 $sql5="SELECT * from publication_journals where Emp4_Id=$emp";
			 $result5=$conn->query($sql5);

			 if(mysqli_num_rows($result5) > 0){
				 echo "<div class='table-responsive '>";
				 echo '<table class="table table-bordered" >';

			 echo '<tr>';
			 echo '<th>Sr no.</th>';

			 if($col5[0] == 1) echo "<th>Journal Name</th>";
			 if($col5[1] == 1) echo "<th>Author</th>";
			 if($col5[2] == 1) echo "<th>Title</th>";
			 if($col5[3] == 1) echo "<th>Date</th>";
			 if($col5[4] == 1) echo "<th>Type</th>";
			 if($col5[5] == 1) echo "<th>Co Authors</th>";
			 if($col5[6] == 1) echo "<th>Book Chapter</th>";
			 if($col5[7] == 1) echo "<th>Peer Reviewed</th>";
			 if($col5[8] == 1) echo "<th>Impact Factor</th>";
			 if($col5[9] == 1) echo "<th>Publisher Name</th>";
			 if($col5[10] == 1) echo "<th>Digital Object Identifier</th>";
			 if($col5[11] == 1) echo "<th>Volume</th>";
			 if($col5[12] == 1) echo "<th>Page Number</th>";
			 if($col5[13] == 1) echo "<th>Issue</th>";
			 if($col5[14] == 1) echo "<th>Citation Index</th>";
			 if($col5[15] == 1) echo "<th>ISSN</th>";
			 if($col5[16] == 1) echo "<th>Paid</th>";
			 if($col5[17] == 1) echo "<th>SJR</th>";
			 echo '</tr>';

			 while($row5 = mysqli_fetch_assoc($result5))
			 {
				 $show3 = 1;
				 for($i=0;$i<sizeof($datecol);$i++)
				 if($datecol[$i] == 12)
				 {
					 $dv = $row5["Date"];
					 //echo $dv;
					 $ab=date_create($fromvalue[$i]);
					 $ba=date_create($tovalue[$i]);
					 $dv=date_create($dv);
					 $diff=date_diff($ab,$dv);
					 $diff1=date_diff($dv,$ba);
					 if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
						 $show3 = -1;
				 }
				 if($show3 == 1){
					 $somevalue = 1;
				 echo '<tr>';
				 echo '<td>'.$c.'</td>';
				 $count = $row5["count"];
				 if($col5[0] == 1)
				 {
					 if($row5["Name"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Name"]."</td>";
					}
				 if($col5[1] == 1)
				 {
					 if($row5["Author"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Author"]."</td>";
					}
				 if($col5[2] == 1)
				 {
					 if($row5["Title"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Title"]."</td>";
					}
				 if($col5[3] == 1)
				 {
					 if($row5["Date"] ==  '1950-01-01')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Date"]."</td>";
					}
				 if($col5[4] == 1)
				 {
					 if($row5["Type"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Type"]."</td>";
					}
				 if($col5[5] == 1)
				 {
					 echo '<td>';
					 if($count != 1 && $count != 2 && $count != 3 && $count != 4 && $count != 5 && $count != 6 && $count != 7 && $count != 8 && $count != 9 && $count != 10)
						echo "Data Not Available";
						else {
							echo "<div class='table-responsive '>";
							echo '<table class="table table-bordered" >';

							echo '<tr>';
							echo '<th>Sr no.</th>';
							echo '<th>Name</th>';
							echo '<th>Affiliation</th>';
							echo '</tr>';
							for($i=1 ; $i<=$count;$i++){
							if($i == 1){
								echo '<tr><td>1</td><td>'.$row5["COA_1"].'</td>';
								if($row5["COA1_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA1_AFF"]."</td>";
								echo '</tr>';
								}
							if($i == 2){
								echo '<tr><td>2</td><td>'.$row5["COA_2"].'</td>';
								if($row5["COA2_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA2_AFF"]."</td>";
								echo '</tr>';
								}
							if($i == 3){
								echo '<tr><td>3</td><td>'.$row5["COA_3"].'</td>';
								if($row5["COA3_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA3_AFF"]."</td>";
								echo '</tr>';
								}
							if($i == 4){
								echo '<tr><td>4</td><td>'.$row5["COA_4"].'</td>';
								if($row5["COA4_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA4_AFF"]."</td>";
								echo '</tr>';
								}
							if($i == 5){
								echo '<tr><td>5</td><td>'.$row5["COA_5"].'</td>';
								if($row5["COA5_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA5_AFF"]."</td>";
								echo '</tr>';
								}
							if($i == 6){
								echo '<tr><td>6</td><td>'.$row5["COA_6"].'</td>';
								if($row5["COA6_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA6_AFF"]."</td>";
								echo '</tr>';
								}

							if($i == 7){
								echo '<tr><td>7</td><td>'.$row5["COA_7"].'</td>';
								if($row5["COA7_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA7_AFF"]."</td>";
								echo '</tr>';
								}

							if($i == 8){
								echo '<tr><td>8</td><td>'.$row5["COA_8"].'</td>';
								if($row5["COA8_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA8_AFF"]."</td>";
								echo '</tr>';
								}
							if($i == 9){
								echo '<tr><td>9</td><td>'.$row5["COA_9"].'</td>';
								if($row5["COA9_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA9_AFF"]."</td>";
								echo '</tr>';
								}
							if($i == 10){
								echo '<tr><td>10</td><td>'.$row5["COA_10"].'</td>';
								if($row5["COA10_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row5["COA10_AFF"]."</td>";
								echo '</tr>';
								}
							}
							echo '</table>';
							echo '</div>';
						}
					 echo '</td>';
				 }
				 if($col5[6] == 1)
				 {
					 if($row5["Book_Chapter"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Book_Chapter"]."</td>";
					}
				 if($col5[7] == 1)
				 {
					 if($row5["Peer_Reviewed"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Peer_Reviewed"]."</td>";
					}
				 if($col5[8] == 1)
				 {
					 if($row5["Impact_Factor"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Impact_Factor"]."</td>";
					}
				 if($col5[9] == 1)
				 {
					 if($row5["Pub_Name"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Pub_Name"]."</td>";
					}
				 if($col5[10] == 1)
				 {
					 if($row5["DOI"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["DOI"]."</td>";
					}
				 if($col5[11] == 1)
				 {
					 if($row5["Volume"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Volume"]."</td>";
					}
				 if($col5[12] == 1)
				 {
					 if($row5["PageNo"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["PageNo"]."</td>";
					}
				 if($col5[13] == 1)
				 {
					 if($row5["Issue"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Issue"]."</td>";
					}
				 if($col5[14] == 1)
				 {
					 if($row5["Citation"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Citation"]."</td>";
					}
				 if($col5[15] == 1)
				 {
					 if($row5["ISSN"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["ISSN"]."</td>";
					}
				 if($col5[16] == 1)
				 {
					 if($row5["Paid"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["Paid"]."</td>";
					}
				 if($col5[17] == 1)
				 {
					 if($row5["SJR"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row5["SJR"]."</td>";
					}
				 echo '</tr>';
				 $c++;
			 }
		 }
		 if($somevalue == 0)
		 echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
			 echo '</table>';
			 echo '</div>';
		 }
		 else {
			 echo 'No Data Available';
		 }
		 echo "</td>";
	 }


	 if($table[5] == 1){
		 $somevalue = 0;
		 $d = 1;
		 echo '<td>';

			 $sql6="SELECT * from publication_conferences where Emp5_Id=$emp";
			 $result6=$conn->query($sql6);

			 if(mysqli_num_rows($result6) > 0){
				 echo "<div class='table-responsive '>";
				 echo '<table class="table table-bordered" >';

			 echo '<tr>';
			 echo '<th>Sr no.</th>';

			 if($col6[0] == 1) echo "<th>Conferences Name</th>";
			 if($col6[1] == 1) echo "<th>Location</th>";
			 if($col6[2] == 1) echo "<th>Type</th>";
			 if($col6[3] == 1) echo "<th>Date</th>";
			 if($col6[4] == 1) echo "<th>Author</th>";
			 if($col6[5] == 1) echo "<th>Co Authors</th>";
			 if($col6[6] == 1) echo "<th>H Index</th>";
			 if($col6[7] == 1) echo "<th>Digital Object Identifier</th>";
			 if($col6[8] == 1) echo "<th>Publication Name</th>";
			 if($col6[9] == 1) echo "<th>Proceding Name</th>";
			 if($col6[10] == 1) echo "<th>Peer Reviewed</th>";
			 if($col6[11] == 1) echo "<th>Theme</th>";
			 if($col6[12] == 1) echo "<th>Paid</th>";
			 if($col6[13] == 1) echo "<th>Page Number</th>";
			 if($col6[14] == 1) echo "<th>ISSN</th>";
			 if($col6[15] == 1) echo "<th>Organizer</th>";
			 if($col6[16] == 1) echo "<th>Presented</th>";
			 if($col6[17] == 1) echo "<th>Poster</th>";
			 if($col6[18] == 1) echo "<th>Web</th>";
			 if($col6[19] == 1) echo "<th>Citation</th>";
			 echo '</tr>';

			 while($row6 = mysqli_fetch_assoc($result6))
			 {
				 $show4 = 1;
				 for($i=0;$i<sizeof($datecol);$i++)
				 if($datecol[$i] == 13)
				 {
					 $dv = $row6["Date"];
					 //echo $dv;
					 $ab=date_create($fromvalue[$i]);
					 $ba=date_create($tovalue[$i]);
					 $dv=date_create($dv);
					 $diff=date_diff($ab,$dv);
					 $diff1=date_diff($dv,$ba);
					 if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
						 $show4 = -1;
				 }
				 if($show4 == 1){
				 $somevalue = 1;
				 echo '<tr>';
				 echo '<td>'.$d.'</td>';
				 $count1 = $row6["count"];
				 if($col6[0] == 1){
					 if($row6["Name"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Name"]."</td>";
					}
				 if($col6[1] == 1){
					 if($row6["Place"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Place"]."</td>";
					}
				 if($col6[2] == 1){
					 if($row6["Type"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Type"]."</td>";
					}
				 if($col6[3] == 1){
					 if($row6["Date"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Date"]."</td>";
					}
				 if($col6[4] == 1){
					 if($row6["Author"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Author"]."</td>";
					}
				 if($col6[5] == 1)
				 {
					 echo '<td>';
					 if($count1 != 1 && $count1 != 2 && $count1 != 3 && $count1 != 4 && $count1 != 5 && $count1 != 6 && $count1 != 7 && $count1 != 8 && $count1 != 9 && $count1 != 10)
						echo "Data Not Available";
						else {
							echo "<div class='table-responsive '>";
							echo '<table class="table table-bordered" >';

							echo '<tr>';
							echo '<th>Sr no.</th>';
							echo '<th>Name</th>';
							echo '<th>Affiliation</th>';
							echo '</tr>';
							for($j=1 ; $j<=$count1;$j++){
							if($j == 1){
								echo '<tr><td>1</td><td>'.$row6["COA1"].'</td>';
								if($row6["COA1_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA1_AFF"]."</td>";
								echo '</tr>';
								}
							if($j == 2){
								echo '<tr><td>2</td><td>'.$row6["COA2"].'</td>';
								if($row6["COA2_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA2_AFF"]."</td>";
								echo '</tr>';
								}

							if($j == 3){
								echo '<tr><td>3</td><td>'.$row6["COA3"].'</td>';
								if($row6["COA3_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA3_AFF"]."</td>";
								echo '</tr>';
								}
							if($j == 4){
								echo '<tr><td>4</td><td>'.$row6["COA4"].'</td>';
								if($row6["COA4_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA4_AFF"]."</td>";
								echo '</tr>';
								}
							if($j == 5){
								echo '<tr><td>5</td><td>'.$row6["COA5"].'</td>';
								if($row6["COA5_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA5_AFF"]."</td>";
								echo '</tr>';
								}
							if($j == 6){
								echo '<tr><td>6</td><td>'.$row6["COA6"].'</td>';
								if($row6["COA6_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA6_AFF"]."</td>";
								echo '</tr>';
								}
							if($j == 7){
								echo '<tr><td>7</td><td>'.$row6["COA7"].'</td>';
								if($row6["COA7_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA7_AFF"]."</td>";
								echo '</tr>';
								}
							if($j == 8){
								echo '<tr><td>8</td><td>'.$row6["COA8"].'</td>';
								if($row6["COA8_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA8_AFF"]."</td>";
								echo '</tr>';
								}
							if($j == 9){
								echo '<tr><td>9</td><td>'.$row6["COA9"].'</td>';
								if($row6["COA9_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA9_AFF"]."</td>";
								echo '</tr>';
								}
							if($j == 10){
								echo '<tr><td>10</td><td>'.$row6["COA10"].'</td>';
								if($row6["COA10_AFF"] ==  ' ')
								echo "<td> - </td>";
								else
								echo "<td>".$row6["COA10_AFF"]."</td>";
								echo '</tr>';
								}
							}
							echo '</table>';
							echo '</div>';
						}
					 echo '</td>';
				 }
				 if($col6[6] == 1){
					 if($row6["H_Index"] ==  0.00)
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["H_Index"]."</td>";
					}
				 if($col6[7] == 1){
					 if($row6["DOI"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["DOI"]."</td>";
					}
				 if($col6[8] == 1){
					 if($row6["Pub_Name"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Pub_Name"]."</td>";
					}
				 if($col6[9] == 1){
					 if($row6["Proc_Name"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Proc_Name"]."</td>";
					}
				 if($col6[10] == 1){
					 if($row6["Peer"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Peer"]."</td>";
					}
				 if($col6[11] == 1){
					 if($row6["Theme"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Theme"]."</td>";
					}
				 if($col6[12] == 1){
					 if($row6["Paid"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Paid"]."</td>";
					}
				 if($col6[13] == 1){
					 if($row6["PageNo"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["PageNo"]."</td>";
					}
				 if($col6[14] == 1){
					 if($row6["ISSN"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["ISSN"]."</td>";
					}
				 if($col6[15] == 1){
					 if($row6["Organizer"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Organizer"]."</td>";
					}
				 if($col6[16] == 1){
					 if($row6["Presented"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Presented"]."</td>";
					}
				 if($col6[17] == 1){
					 if($row6["Poster"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Poster"]."</td>";
					}
				 if($col6[18] == 1){
					 if($row6["Web"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Web"]."</td>";
					}
				 if($col6[19] == 1){
					 if($row6["Citation_Index"] ==  '')
						echo "<td> - </td>";
					 else
						echo "<td>".$row6["Citation_Index"]."</td>";
					}

				 echo '</tr>';
				 $d++;
			 }
		 }
		 if($somevalue == 0)
		 echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
			 echo '</table>';
			 echo '</div>';
		 }
		 else {
			 echo 'No Data Available';
		 }
		 echo "</td>";
	 }


	 if($table[6] == 1){
		 $somevalue = 0;
		 $e = 1;
		 echo '<td>';

		 $sql7="SELECT * FROM sttp_event_attended WHERE Emp6_Id=$emp";
		 $result7=$conn->query($sql7);

			 if(mysqli_num_rows($result7) > 0){
				 echo "<div class='table-responsive '>";
				 echo '<table class="table table-bordered" >';

				echo '<tr>';
				echo '<th>Sr no.</th>';

				if($col7[0] == 1) echo "<th>Title</th>";
				if($col7[1] == 1) echo "<th>Speaker</th>";
				if($col7[2] == 1) echo "<th>Organized By</th>";
				if($col7[3] == 1) echo "<th>Event Type</th>";
				if($col7[4] == 1) echo "<th>Location</th>";
				if($col7[5] == 1) echo "<th>Duration</th>";
				if($col7[6] == 1) echo "<th>Date From</th>";
				if($col7[7] == 1) echo "<th>Date To</th>";
				if($col7[8] == 1) echo "<th>Total Participation</th>";
			 echo '</tr>';

			 while($row7 = mysqli_fetch_assoc($result7))
			 {
				 $show5 = 1;
				 for($i=0;$i<sizeof($datecol);$i++)
				 if($datecol[$i] == 14)
				 {
					 $dv1 = $row7["Date_From"];
					 $dv2 = $row7["Date_To"];
					 //echo $dv;
					 $ab=date_create($fromvalue[$i]);
					 $ba=date_create($tovalue[$i]);
					 $dv1=date_create($dv1);
					 $dv2=date_create($dv2);
					 $diff=date_diff($ab,$dv1);
					 $diff1=date_diff($dv1,$ba);
					 $diff2=date_diff($ab,$dv2);
					 $diff3=date_diff($dv2,$ba);
					 if(($diff->format("%R")=='-')||($diff1->format("%R")=='-')||($diff2->format("%R")=='-')||($diff3->format("%R")=='-'))
						 $show5 = -1;
				 }
				 if($show5 == 1){
					 $somevalue = 1;
				 echo '<tr>';
				 echo '<td>'.$e.'</td>';

							if($col7[0] == 1){
							 if($row7["Title"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row7["Title"]."</td>";
							}
							if($col7[1] == 1){
							 if($row7["Speaker"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row7["Speaker"]."</td>";
							}
							if($col7[2] == 1){
							 if($row7["Organized_By"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row7["Organized_By"]."</td>";
							}
							if($col7[3] == 1){
							 if($row7["Event_Type"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row7["Event_Type"]."</td>";
							}
							if($col7[4] == 1){
							 if($row7["Place"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row7["Place"]."</td>";
							}
							if($col7[5] == 1){
							 if($row7["Duration"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row7["Duration"]."</td>";
							}
							if($col7[6] == 1){
							 if($row7["Date_From"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row7["Date_From"]."</td>";
							}
							if($col7[7] == 1){
							 if($row7["Date_To"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row7["Date_To"]."</td>";
							}
							if($col7[8] == 1){
							 if($row7["Total_Participation"] ==  0)
								echo "<td> - </td>";
							 else
								echo "<td>".$row7["Total_Participation"]."</td>";
							}

				 echo '</tr>';
				 $e++;
			 }
		 }
		 if($somevalue == 0)
		 echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
			 echo '</table>';
			 echo '</div>';
		 }
		 else {
			 echo 'No Data Available';
		 }
		 echo "</td>";
	 }

	 if($table[7] == 1){
		 $somevalue =0;
		 $f = 1;
		 echo '<td>';

		 $sql8="SELECT * FROM sttp_event_organized WHERE Emp7_Id=$emp";
		 $result8=$conn->query($sql8);

			 if(mysqli_num_rows($result8) > 0){
				 echo "<div class='table-responsive '>";
				 echo '<table class="table table-bordered" >';

				echo '<tr>';
				echo '<th>Sr no.</th>';

				if($col8[0] == 1) echo "<th>Name</th>";
				if($col8[1] == 1) echo "<th>Type</th>";
				if($col8[2] == 1) echo "<th>Role</th>";
				if($col8[3] == 1) echo "<th>Location</th>";
				if($col8[4] == 1) echo "<th>Date From</th>";
				if($col8[5] == 1) echo "<th>Date To</th>";
				if($col8[6] == 1) echo "<th>Total Participation</th>";
			 echo '</tr>';

			 while($row8 = mysqli_fetch_assoc($result8))
			 {
				 $show6 = 1;
				 for($i=0;$i<sizeof($datecol);$i++)
				 if($datecol[$i] == 15)
				 {
					 $dv1 = $row8["Date_From"];
					 $dv2 = $row8["Date_To"];
					 //echo $dv;
					 $ab=date_create($fromvalue[$i]);
					 $ba=date_create($tovalue[$i]);
					 $dv1=date_create($dv1);
					 $dv2=date_create($dv2);
					 $diff=date_diff($ab,$dv1);
					 $diff1=date_diff($dv1,$ba);
					 $diff2=date_diff($ab,$dv2);
					 $diff3=date_diff($dv2,$ba);
					 if(($diff->format("%R")=='-')||($diff1->format("%R")=='-')||($diff2->format("%R")=='-')||($diff3->format("%R")=='-'))
						 $show6 = -1;
				 }
				 if($show6 == 1){
					 $somevalue = 1;
				 echo '<tr>';
				 echo '<td>'.$f.'</td>';

							if($col8[0] == 1){
							 if($row8["Name"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row8["Name"]."</td>";
							}
							if($col8[1] == 1){
							 if($row8["Type"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row8["Type"]."</td>";
							}
							if($col8[2] == 1){
							 if($row8["Role"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row8["Role"]."</td>";
							}
							if($col8[3] == 1){
							 if($row8["Place"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row8["Place"]."</td>";
							}
							if($col8[4] == 1){
							 if($row8["Date_From"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row8["Date_From"]."</td>";
							}
							if($col8[5] == 1){
							 if($row8["Date_To"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row8["Date_To"]."</td>";
							}
							if($col8[6] == 1){
							 if($row8["Number_Participants"] ==  0)
								echo "<td> - </td>";
							 else
								echo "<td>".$row8["Number_Participants"]."</td>";
							}

				 echo '</tr>';
				 $f++;
			 }
		 }
		 if($somevalue == 0)
		 echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
			 echo '</table>';
			 echo '</div>';
		 }
		 else {
			 echo 'No Data Available';
		 }
		 echo "</td>";
	 }

	 if($table[8] == 1){
		 $somevalue=0;
		 $g = 1;
		 echo '<td>';

		 $sql9="SELECT * FROM sttp_event_delivered WHERE Emp9_Id=$emp";
		 $result9=$conn->query($sql9);

			 if(mysqli_num_rows($result9) > 0){
				 echo "<div class='table-responsive '>";
				 echo '<table class="table table-bordered" >';

				echo '<tr>';
				echo '<th>Sr no.</th>';

				if($col9[0] == 1) echo "<th>Name</th>";
				if($col9[1] == 1) echo "<th>Description</th>";
				if($col9[2] == 1) echo "<th>Type</th>";
				if($col9[3] == 1) echo "<th>Duration</th>";
				if($col9[4] == 1) echo "<th>Location</th>";
				if($col9[5] == 1) echo "<th>Date From</th>";
				if($col9[6] == 1) echo "<th>Date To</th>";
			 echo '</tr>';

			 while($row9 = mysqli_fetch_assoc($result9))
			 {
				 $show7 = 1;
				 for($i=0;$i<sizeof($datecol);$i++)
				 if($datecol[$i] == 16)
				 {
					 $dv1 = $row9["Date_From"];
					 $dv2 = $row9["Date_To"];
					 //echo $dv;
					 $ab=date_create($fromvalue[$i]);
					 $ba=date_create($tovalue[$i]);
					 $dv1=date_create($dv1);
					 $dv2=date_create($dv2);
					 $diff=date_diff($ab,$dv1);
					 $diff1=date_diff($dv1,$ba);
					 $diff2=date_diff($ab,$dv2);
					 $diff3=date_diff($dv2,$ba);
					 if(($diff->format("%R")=='-')||($diff1->format("%R")=='-')||($diff2->format("%R")=='-')||($diff3->format("%R")=='-'))
						 $show7 = -1;
				 }
				 if($show7 == 1){
					 $somevalue = 1;
				 echo '<tr>';
				 echo '<td>'.$g.'</td>';

							if($col9[0] == 1){
							 if($row9["Name"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row9["Name"]."</td>";
							}
							if($col9[1] == 1){
							 if($row9["Description"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row9["Description"]."</td>";
							}
							if($col9[2] == 1){
							 if($row9["Event_Type"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row9["Event_Type"]."</td>";
							}
							if($col9[3] == 1){
							 if($row9["Duration"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row9["Duration"]."</td>";
							}
							if($col9[4] == 1){
							 if($row9["Place"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row9["Place"]."</td>";
							}
							if($col9[5] == 1){
							 if($row9["Date_From"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row9["Date_From"]."</td>";
							}
							if($col9[6] == 1){
							 if($row9["Date_To"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row9["Date_To"]."</td>";
							}
				 echo '</tr>';
				 $g++;
			 }
		 }
		 if($somevalue == 0)
		 echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
			 echo '</table>';
			 echo '</div>';
		 }
		 else {
			 echo 'No Data Available';
		 }
		 echo "</td>";
	 }

	 if($table[9] == 1){
		 $somevalue=0;
		 $h = 1;
		 echo '<td>';

		 $sql10="SELECT * FROM co_curricular WHERE Emp10_Id=$emp";
		 $result10=$conn->query($sql10);

			 if(mysqli_num_rows($result10) > 0){
				 echo "<div class='table-responsive '>";
				 echo '<table class="table table-bordered" >';

				echo '<tr>';
				echo '<th>Sr no.</th>';

				if($col10[0] == 1) echo "<th>Name</th>";
				if($col10[1] == 1) echo "<th>Description</th>";
				if($col10[2] == 1) echo "<th>Type</th>";
				if($col10[3] == 1) echo "<th>Role</th>";
				if($col10[4] == 1) echo "<th>Date</th>";
			 echo '</tr>';

			 while($row10 = mysqli_fetch_assoc($result10))
			 {
				 $show8 = 1;
				 for($i=0;$i<sizeof($datecol);$i++)
				 if($datecol[$i] == 17)
				 {
					 $dv = $row10["Date"];
					 //echo $dv;
					 $ab=date_create($fromvalue[$i]);
					 $ba=date_create($tovalue[$i]);
					 $dv=date_create($dv);
					 $diff=date_diff($ab,$dv);
					 $diff1=date_diff($dv,$ba);
					 if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
						 $show8 = -1;
				 }
				 if($show8 == 1){
				 $somevalue = 1;
				 echo '<tr>';
				 echo '<td>'.$h.'</td>';

							if($col10[0] == 1){
							 if($row10["Name"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row10["Name"]."</td>";
							}
							if($col10[1] == 1){
							 if($row10["Description"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row10["Description"]."</td>";
							}
							if($col10[2] == 1){
							 if($row10["Type"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row10["Type"]."</td>";
							}
							if($col10[3] == 1){
							 if($row10["Role"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row10["Role"]."</td>";
							}
							if($col10[4] == 1){
							 if($row10["Date"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row10["Date"]."</td>";
							}
				 echo '</tr>';
				 $h++;
			 }
		 }
		 if($somevalue == 0)
		 echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
			 echo '</table>';
			 echo '</div>';
		 }
		 else {
			 echo 'No Data Available';
		 }
		 echo "</td>";
	 }

	 if($table[10] == 1){
		 $somevalue=0;
		 $k = 1;
		 echo '<td>';

		 $sql11="SELECT * FROM extra WHERE Emp11_Id=$emp";
		 $result11=$conn->query($sql11);

			 if(mysqli_num_rows($result11) > 0){
				 echo "<div class='table-responsive '>";
				 echo '<table class="table table-bordered" >';

				echo '<tr>';
				echo '<th>Sr no.</th>';

				if($col11[0] == 1) echo "<th>Name</th>";
				if($col11[1] == 1) echo "<th>Description</th>";
				if($col11[2] == 1) echo "<th>Place</th>";
				if($col11[3] == 1) echo "<th>Role</th>";
				if($col11[4] == 1) echo "<th>Date</th>";
			 echo '</tr>';

			 while($row11 = mysqli_fetch_assoc($result11))
			 {
				 $show9 = 1;
				 for($i=0;$i<sizeof($datecol);$i++)
				 if($datecol[$i] == 18)
				 {
					 $dv = $row11["Date"];
					 //echo $dv;
					 $ab=date_create($fromvalue[$i]);
					 $ba=date_create($tovalue[$i]);
					 $dv=date_create($dv);
					 $diff=date_diff($ab,$dv);
					 $diff1=date_diff($dv,$ba);
					 if(($diff->format("%R")=='-')||($diff1->format("%R")=='-'))
						 $show9 = -1;
				 }
				 if($show9 == 1){
				 $somevalue = 1;
				 echo '<tr>';
				 echo '<td>'.$k.'</td>';

							if($col11[0] == 1){
							 if($row11["Name"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row11["Name"]."</td>";
							}
							if($col11[1] == 1){
							 if($row11["Description"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row11["Description"]."</td>";
							}
							if($col11[2] == 1){
							 if($row11["Place"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row11["Place"]."</td>";
							}
							if($col11[3] == 1){
							 if($row11["Role"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row11["Role"]."</td>";
							}
							if($col11[4] == 1){
							 if($row11["Date"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row11["Date"]."</td>";
							}
				 echo '</tr>';
				 $k++;
			 }
		 }
		 if($somevalue == 0)
		 echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
			 echo '</table>';
			 echo '</div>';
		 }
		 else {
			 echo 'No Data Available';
		 }
		 echo "</td>";
	 }

	 if($table[11] == 1){
		 $somevalue=0;
		 $l = 1;
		 echo '<td>';

		 $sql12="SELECT * FROM projects WHERE Emp12_Id=$emp";
		 $result12=$conn->query($sql12);

			 if(mysqli_num_rows($result12) > 0){
				 echo "<div class='table-responsive '>";
				 echo '<table class="table table-bordered" >';

				echo '<tr>';
				echo '<th>Sr no.</th>';

				if($col12[0] == 1) echo "<th>Title</th>";
				if($col12[1] == 1) echo "<th>Type</th>";
				if($col12[2] == 1) echo "<th>Description</th>";
				if($col12[3] == 1) echo "<th>Year</th>";
				if($col12[4] == 1) echo "<th>Student Details</th>";
			 echo '</tr>';

			 while($row12 = mysqli_fetch_assoc($result12))
			 {
				 $show10=1;
				 for($i=0;$i<sizeof($datecol);$i++)
				 if($datecol[$i] == 19)
					{
					$dv = $row12["Year"];
					$ab=(date_create($fromvalue[$i]))->format("Y");
					$ba=(date_create($tovalue[$i]))->format("Y");
					if(($ab>$dv)||($ba<$dv))
						$show10 = -1;
					}
					if($show10 == 1){
						$somevalue=1;
						echo '<tr>';
						echo '<td>'.$l.'</td>';

							if($col12[0] == 1){
							 if($row12["Title"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row12["Title"]."</td>";
							}
							if($col12[1] == 1){
							 if($row12["Type"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row12["Type"]."</td>";
							}
							if($col12[2] == 1){
							 if($row12["Description"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row12["Description"]."</td>";
							}
							if($col12[3] == 1){
							 if($row12["Year"] ==  '')
								echo "<td> - </td>";
							 else
								echo "<td>".$row12["Year"]."</td>";
							}
							if($col12[4] == 1)
							{
								echo "<td>";
								if(($row12["S1_name"]=="")&&($row12["S2_name"]=="")&&($row12["S3_name"]=="")&&($row12["S4_name"]==""))
									echo "Data Not Available";
								else {
										echo "<div class='table-responsive '>";
										echo "<table class='table table-bordered' >";

										echo "<tr>";
											echo "<th>Sr No.</th>";
											echo "<th>Name</th>";
											echo "<th>Roll Number</th>";
											echo "<th>Email</th>";
										echo "</tr>";

										if($row12["S1_name"]!=""){
											echo "<tr><td>1</td>";
											if($row12["S1_name"] != "") echo "<td>".$row12["S1_name"]."</td>";else echo "<td>-</td>";
											if($row12["S1_roll"] != "") echo "<td>".$row12["S1_roll"]."</td>";else echo "<td>-</td>";
											if($row12["S1_email"] != "") echo "<td>".$row12["S1_email"]."</td>";else echo "<td>-</td>";
											echo "</tr>";
										}
										if($row12["S2_name"]!=""){
											echo "<tr><td>2</td>";
											if($row12["S2_name"] != "") echo "<td>".$row12["S2_name"]."</td>";else echo "<td>-</td>";
											if($row12["S2_roll"] != "") echo "<td>".$row12["S2_roll"]."</td>";else echo "<td>-</td>";
											if($row12["S2_email"] != "") echo "<td>".$row12["S2_email"]."</td>";else echo "<td>-</td>";
											echo "</tr>";
										}
										if($row12["S2_name"]!=""){
											echo "<tr><td>3</td>";
											if($row12["S3_name"] != "") echo "<td>".$row12["S3_name"]."</td>";else echo "<td>-</td>";
											if($row12["S3_roll"] != "") echo "<td>".$row12["S3_roll"]."</td>";else echo "<td>-</td>";
											if($row12["S3_email"] != "") echo "<td>".$row12["S3_email"]."</td>";else echo "<td>-</td>";
											echo "</tr>";
										}
										if($row12["S2_name"]!=""){
											echo "<tr><td>4</td>";
											if($row12["S4_name"] != "") echo "<td>".$row12["S4_name"]."</td>";else echo "<td>-</td>";
											if($row12["S4_roll"] != "") echo "<td>".$row12["S4_roll"]."</td>";else echo "<td>-</td>";
											if($row12["S4_email"] != "") echo "<td>".$row12["S4_email"]."</td>";else echo "<td>-</td>";
											echo "</tr>";
										}
										echo "</table>";
										echo '</div>';
								}
								echo "</td>";
							}

				 echo '</tr>';
				 $l++;
			 }
		 }
		 if($somevalue == 0)
		 echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
			 echo '</table>';
			 echo '</div>';
		 }
		 else {
			 echo 'No Data Available';
		 }
		 echo "</td>";
	 }

	  $srno++;
	   echo "</tr>";
   }
	}
}
		echo '</table>';
	echo "</div>";
}
else {
	echo "<center>No Data To Be Displayed</center>";
	}
 ?>
</div>
 </body>
</html>
