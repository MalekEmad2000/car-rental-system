<?php
session_start();

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$conn=mysqli_connect('localhost','root','','rental');



$sql2="SELECT * FROM `system_user` WHERE email='$email'";
$query=mysqli_query($conn,$sql2);
$user=mysqli_fetch_array($query);
if($email=="" || $password=="" || $password==""|| $confirm_password=="")
echo "please fill all fields";
elseif(!empty($user)){
  echo "emaill already exists";
}
elseif ($password!=$confirm_password) {
  echo "password mismatch";
}
else{

  $sql_query ="INSERT INTO system_user(user_name,email,pass)
  values('$name','$email','$password') ";
  if(mysqli_query($conn,$sql_query)){
  echo "inserted user succefully";



  }

}

mysqli_close($conn);

//
?>
