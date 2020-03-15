<?php
include 'dbconnect.php';
$faculty = $_REQUEST['q'];
$sql = 'delete from login where emp_id=' . $faculty;
if ($res = $conn->query($sql)) {
    echo 'Removed from the list';
} else {
    echo 'Failed to remove from the list';
}


