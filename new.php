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

if(isset($_POST["addmem_submit"]))
{
    echo "wort";
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
    echo "";

    //$sql = "INSERT INTO login (first_name, last_name, email) VALUES ('Peter', 'Parker', 'peterparker@mail.com')";
    $sql = "INSERT INTO `login`(`Emp_Id`, `Password`, `P1`, `P2`, `P3`, `P4`, `P5`, `Security_Question`, `Security_Answer`, `admin_rights`)VALUES('$empid','$pwd','$p1','$p2','$p3','$p4','$p5','','')";
    //$results = $conn->query($sql);
    //echo $results;
    if($conn->query($sql) === true)
    {
        echo "working";
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