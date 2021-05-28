<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$db="registration";


session_start();
// Create connection

$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection

if (!$conn) {

      die("Connection failed: " . mysqli_connect_error());
}
 

$username = $_POST['username']; 
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd-repeat'];
$role = $_POST['role'];



$sql = "SELECT * FROM signup WHERE username = '$username' AND pwd = '$pwd'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
{
        echo  '<script type="text/javascript"> ';
         echo 'alert("Username already exists!")';
         echo '</script> <a href="signup.html">Back to Sign UP </a>';
         header('Location:signup.html');
}
else
{

$sql = "INSERT INTO signup (username,email,pwd,role) VALUES ('$username','$email', '$pwd','$role')";
    if (mysqli_query($conn, $sql))
    {
     header('Location:loginmain.php');
    }

    else
    {
        echo  '<script> ';
        echo 'alert("Error: " . $sql . "<br>" . mysqli_error($conn)")';
        echo '</script>';
                        
    }
}


$text = "Hello you have recieved a mail from $username. Their Email Address is $email.The role assigned for you is : $role";
// send email
mail("$email","Contact-Portfolio",$text);
header('Location:loginmain.php');

?>
