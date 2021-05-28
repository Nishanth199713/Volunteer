<?php
session_start();
$conn=mysqli_connect('localhost','tj_root','tj_root','volunteerlogin');
//Getting Input value
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['pwd'];
  if(empty($username)&&empty($password)){
  $error= 'Fields are Mandatory';
  }
  else{
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
   
         
          if($role == "Staff")
    {
echo  '<script type="text/javascript"> ';
         echo 'alert("Welcome Professor!")';
         echo '</script> <a href="professor.html">Staff Homepage </a>';
         header('Location:professor.html');    }
    if($role == "Student")
    {
echo  '<script type="text/javascript"> ';
         echo 'alert("Welcome Student!")';
         echo '</script> <a href="student.html">Student Homepage </a>';
         header('Location:studentdashboard.php');    }
    if($role == "Department")
    {
echo  '<script type="text/javascript"> ';
         echo 'alert("Welcome Deaprtment Admin!")';
         echo '</script> <a href="department.html">Department Homepage </a>';
         header('Location:department.html');    }
    if($role == "Admin")
    {
echo  '<script type="text/javascript"> ';
        echo 'alert("Welcome Admin!")';
        echo '</script> <a href="admin.html">Admin Homepage </a>';
        header('Location:admin.html');    }     
 }else{
    $_SESSION['error'] = 'Error: \'Please fill both the username and password fields!';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
 }
}
}
?>