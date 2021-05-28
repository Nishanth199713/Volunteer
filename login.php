<?php
session_start();
$conn=mysqli_connect('localhost:3308','root','','registration');
//Getting Input value
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['pwd'];
  if(empty($username)&&empty($password)){
  $error= 'Fields are Mandatory';
  }else{
 //Checking Login Detail
 $result=mysqli_query($conn,"SELECT * FROM signup WHERE username='$username' AND pwd='$password'");
 $row=mysqli_fetch_assoc($result);
 $count=mysqli_num_rows($result);
 //echo $count;
 if($count==1){
      $_SESSION['signup']=array(
   'username'=>$row['username'],
   'pwd'=>$row['pwd'],
   'role'=>$row['role']
   );
   $role=$_SESSION['signup']['role'];
   //echo $role;
   //Redirecting User Based on Role 
   
         
    if($role == "Professor")
    {
echo  '<script type="text/javascript"> ';
         echo 'alert("Welcome Professor!")';
         echo '</script> <a href="professorhome.php">Professor Homepage </a>';
         header('Location:professorhome.php');    }
    if($role == "Student")
    {
echo  '<script type="text/javascript"> ';
         echo 'alert("Welcome Student!")';
         echo '</script> <a href="studenthome.html">Student Homepage </a>';
         header('Location:studenthome.html');    }
    if($role == "Department")
    {
echo  '<script type="text/javascript"> ';
         echo 'alert("Welcome Department Head!")';
         echo '</script> <a href="departmenthome.php">Department Homepage </a>';
         header('Location:departmenthome.php');    }
 }
 else{
  $_SESSION['error'] = 'Error: \'username and password fields are incorrect!';
  header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
 }
}
}
?>