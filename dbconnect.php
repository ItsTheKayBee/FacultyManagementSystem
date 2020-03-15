<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "faculty") or die("Connection failed" . mysqli_connect_error());
date_default_timezone_set("Asia/Kolkata");

$sql = "SELECT * FROM edit";
$result = $conn->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
    $idset = $row["Emp1_Id"];
    $idgiven = $row["Emp2_Id"];
    $date = $row["Date"];
    $today = date("Y-m-d");
    $ab = date_create($today);
    $ba = date_create($date);
    $diff = date_diff($ab, $ba);
    if ($diff->format("%R") == '-') {
        $sql = "DELETE FROM edit WHERE Emp1_Id='$idset' AND Emp2_Id='$idgiven' AND Date='$date'";
        $conn->query($sql);
    }
}
