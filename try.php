<?php

session_start();

$email=$_POST['email'];
$password=$_POST['password'];
$conn=mysqli_connect('localhost','root','','rental');
$sql="SELECT * FROM `system_user` WHERE email='$email' AND pass='$password'";
$query=mysqli_query($conn,$sql);
$user=mysqli_fetch_array($query);
if($email=="" || $password=="")
echo "please fill all fields";
elseif (empty($user)) {
echo "email and password dont match";
}else {
echo $user['admin'];

$_SESSION['user_id']=$user['user_id'];
$_SESSION['user_name']=$user['user_name'];
}
mysqli_close($conn);

?>
