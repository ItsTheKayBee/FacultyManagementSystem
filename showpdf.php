<?php
include 'dbconnect.php';
if(isset($_SESSION["EditId"]))
	$empid=$_SESSION["EditId"];
elseif(isset($_SESSION["Emp_Id"]) )
	$empid=$_SESSION["Emp_Id"];
else {
	header('Location:logout.php');
}
/*echo $empid;*/
// ACADEMIC DETAILS //
$myData = json_decode( base64_decode( $_GET['parameter'] ) );
$academic = $myData->academic;

if($academic == "ssc")
{
	$query = "SELECT SSC_Marksheet FROM academic_details WHERE Emp2_Id=$empid" ;
	$result1 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result1))
	{
		header('Pragma: public');
		header('Expires: 0');
		header('Content-Type: $mime');
		header('Content-Description: File Transfer');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header("Content-type: application/pdf;");
		ob_clean();
		flush();
		$pdf_content = ($row["SSC_Marksheet"]);
		echo $pdf_content;
		break;
	}
}

if($academic == "hsc")
{
	$query = "SELECT HSC_Marksheet FROM academic_details WHERE Emp2_Id=$empid" ;
	$result2 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result2))
	{
		header('Pragma: public');
		header('Expires: 0');
		header('Content-Type: $mime');
		header('Content-Description: File Transfer');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header("Content-type: application/pdf");
		ob_clean();
		flush();
		$pdf_content = ($row["HSC_Marksheet"]);
		echo $pdf_content;
		break;
	}
}

if($academic == "btech")
{
	$query = "SELECT Bachelors_Marksheet FROM academic_details WHERE Emp2_Id=$empid" ;
	$result3 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result3))
	{
		header('Pragma: public');
		header('Expires: 0');
		header('Content-Type: $mime');
		header('Content-Description: File Transfer');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header("Content-type: application/pdf");
		ob_clean();
		flush();
		$pdf_content = ($row["Bachelors_Marksheet"]);
		echo $pdf_content;
		break;
	}
}

if($academic == "mtech")
{
	$query = "SELECT Masters_Marksheet FROM academic_details WHERE Emp2_Id=$empid" ;
	$result4 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result4))
	{
		header('Pragma: public');
		header('Expires: 0');
		header('Content-Type: $mime');
		header('Content-Description: File Transfer');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header("Content-type: application/pdf");
		ob_clean();
		flush();
		$pdf_content = ($row["Masters_Marksheet"]);
		echo $pdf_content;
		break;
	}
}

if($academic == "phd")
{
	$query = "SELECT Phd_Marksheet FROM academic_details WHERE Emp2_Id=$empid" ;
	$result5 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result5))
	{
		header('Pragma: public');
		header('Expires: 0');
		header('Content-Type: $mime');
		header('Content-Description: File Transfer');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header("Content-type: application/pdf");
		ob_clean();
		flush();
		$pdf_content = ($row["Phd_Marksheet"]);
		echo $pdf_content;
		break;
	}
}


// PUBLICATIONS //
$pub = $myData->pub;
// BOOKS //
if($pub == "b")
{
	$query = "SELECT Cover FROM publication_books WHERE Emp1_Id=$empid" ;
	$cid = $myData->cid;
	$checkpb = 0;

	$result1 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result1))
	{
		if($checkpb == $cid)
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Content-Type: $mime');
			header('Content-Description: File Transfer');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: application/pdf");
			ob_clean();
			flush();
			$pdf_content = ($row["Cover"]);
			echo $pdf_content;
			break;
		}
		else
			$checkpb++;
	}
}

// JOURNALS : PAPER //
if($pub == "jpaper")
{
	$query = "SELECT Paper_PDF FROM publication_journals WHERE Emp4_Id=$empid" ;
	$cid = $myData->cid;
	$checkpj = 0;

	$result1 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result1))
	{
		if($checkpj == $cid)
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Content-Type: $mime');
			header('Content-Description: File Transfer');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: application/pdf");
			ob_clean();
			flush();
			$pdf_content = ($row["Paper_PDF"]);
			echo $pdf_content;
			break;
		}
		else
			$checkpj++;
	}
}
// JOURNALS : CERTIFICATE //
if($pub == "jcerti")
{
	$query = "SELECT Certificate FROM publication_journals WHERE Emp4_Id=$empid" ;
	$cid = $myData->cid;
	$checkpjc = 0;

	$result1 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result1))
	{
		if($checkpjc == $cid)
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Content-Type: $mime');
			header('Content-Description: File Transfer');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: application/pdf");
			ob_clean();
			flush();
			$pdf_content = ($row["Certificate"]);
			echo $pdf_content;
			break;
		}
		else
			$checkpjc++;
	}
}
// CONFERENCES : POSTER //
if($pub == "cposter")
{
	$query = "SELECT presentation_pdf FROM publication_conferences WHERE Emp5_Id=$empid" ;
	$cid = $myData->cid;
	$checkpos = 0;
	$result2 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result2))
	{
		if($checkpos == $cid)
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Content-Type: $mime');
			header('Content-Description: File Transfer');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: application/pdf");
			ob_clean();
			flush();
			$pdf_content = ($row["presentation_pdf"]);
			echo $pdf_content;
			break;
		}
		else
			$checkpos++;
	}
}
// CONFERENCES : PAPER //
if($pub == "cpaper")
{
	$query = "SELECT Paper_Pdf FROM publication_conferences WHERE Emp5_Id=$empid" ;
	$cid = $myData->cid;
	$checkpc = 0;
	$result2 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result2))
	{
		if($checkpc == $cid)
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Content-Type: $mime');
			header('Content-Description: File Transfer');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: application/pdf");
			ob_clean();
			flush();
			$pdf_content = ($row["Paper_Pdf"]);
			echo $pdf_content;
			break;
		}
		else
			$checkpc++;
	}
}
// CONFERENCES : CERTIFICATE //
if($pub == "ccerti")
{
	$query = "SELECT Certificate FROM publication_conferences WHERE Emp5_Id=$empid" ;
	$cid = $myData->cid;
	$checkpcc = 0;

	$result2 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result2))
	{
		if($checkpcc == $cid)
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Content-Type: $mime');
			header('Content-Description: File Transfer');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: application/pdf");
			ob_clean();
			flush();
			$pdf_content = ($row["Certificate"]);
			echo $pdf_content;
			break;
		}
		else
			$checkpcc++;
	}
}

// STTP ATTENDED : CERTIFICATE //
$sttp = $myData->sttp;

if($sttp == 1)
{
	$query = "SELECT Certificate FROM sttp_event_attended WHERE Emp6_Id=$empid" ;
	$cid = $myData->cid;
	$checksa = 0;

	$result2 = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result2))
	{
		if($checksa == $cid)
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Content-Type: $mime');
			header('Content-Description: File Transfer');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: application/pdf");
			ob_clean();
			flush();
			$pdf_content = ($row["Certificate"]);
			echo $pdf_content;
			break;
		}
		else
			$checksa++;
	}
}

$extr = $myData->extr;

if($extr == "1")
{
	$query = "SELECT Certificate FROM extra WHERE Emp11_Id=$empid" ;
	$cid = $myData->cid;
	$checkextra = 0;

	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		if($checkextra == $cid)
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Content-Type: $mime');
			header('Content-Description: File Transfer');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: application/pdf");
			ob_clean();
			flush();
			$pdf_content = ($row["Certificate"]);
			echo $pdf_content;
			break;
		}
		else
			$checkextra++;
	}
}

$awd = $myData->awd;

if($awd == "1")
{
	$query = "SELECT certificate FROM awards WHERE emp_id=$empid" ;
	$cid = $myData->cid;
	$checkpjc = 0;

	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		if($checkpjc == $cid)
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Content-Type: $mime');
			header('Content-Description: File Transfer');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: application/pdf");
			ob_clean();
			flush();
			$pdf_content = ($row["certificate"]);
			echo $pdf_content;
			break;
		}
		else
			$checkpjc++;
	}
}
?>
