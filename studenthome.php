<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost:3308", "root", "", "registration");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['data_13']);
$middle_name = mysqli_real_escape_string($link, $_REQUEST['data_14']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['data_15']);
$street_address= mysqli_real_escape_string($link, $_REQUEST['data_16']);
$city = mysqli_real_escape_string($link, $_REQUEST['data_17']);
$province = mysqli_real_escape_string($link, $_REQUEST['data_18']);
$email = mysqli_real_escape_string($link, $_REQUEST['data_19']);
$phone = mysqli_real_escape_string($link, $_REQUEST['data_20']);
$position = mysqli_real_escape_string($link, $_REQUEST['data_21']);
$department = mysqli_real_escape_string($link, $_REQUEST['data_22']);
$professor = mysqli_real_escape_string($link, $_REQUEST['data_23']);
$date = mysqli_real_escape_string($link, $_REQUEST['data_24']);
$interest = ' ';
if(!empty($_POST['data_7'])) {
    foreach($_POST['data_7'] as $check) {
    	$interest.=$check;
    	if ($interest) $interest .= ',';
    }
}
 
// Attempt insert query execution
$sql = "INSERT INTO persons (firstname,middlename,lastname,streetaddress,city,province,email,phone,position,department,professor,date,interest,recruited,approval) VALUES ('$first_name', '$middle_name', '$last_name','$street_address','$city','$province','$email','$phone','$position','$department','$professor','$date','$interest','No','No')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>