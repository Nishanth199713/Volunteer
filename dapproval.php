<?php 
// Connection info.
$conn=mysqli_connect('localhost:3308','root','','registration');
session_start();
$intr = '';
if(!empty($_POST['checkboxx'])) {
    foreach($_POST['checkboxx'] as $check) {
    	$intr.=$check;
    	if ($intr) $intr .= ',';
    }
}
$newarraynama = rtrim($intr, ", ");
$sql = "UPDATE persons SET approval ='yes' WHERE id='{$newarraynama}'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();

?>