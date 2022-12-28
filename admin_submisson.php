<?php
session_start();

if(isset($_SESSION['user_id'])){
$model=$_POST['car_model'];
$type=$_POST['car_type'];
$plate=$_POST['plate_id'];
if(isset($_POST['air_con'])){
$air_con=$_POST['air_con'];
}
$model_year=$_POST['model_year'];
$price_per_day=$_POST['price_per_day'];


if( $model==""  or $type=="" or $plate==""  or $model_year=="" or $price_per_day=="" or !isset($_POST['air_con']) ){

 echo "please fill all fields";

}else{
  $conn=mysqli_connect('localhost','root','','rental');
  $sql="INSERT INTO car(plate_id,manefacturing_company,model,airconditioned,status,model_year,price_per_day) VALUES('$plate','$type','$model','$air_con','1','$model_year','$price_per_day') "; // make car id auto increment
  $query=mysqli_query($conn,$sql);
  echo "inserted car";


}

}else {
  echo "please login";
}

 ?>
