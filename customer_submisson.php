<?php
session_start();


// send user id
if(isset($_SESSION['user_id'])){
$user_id=$_SESSION['user_id'];


if(isset($_POST['model_select']))
$model=$_POST['model_select'];

if($model !="" ){
$model=explode(" ",$model);
$m1=$model[0];
$m2=$model[1];
$m3=$model[2];
}
if(isset($_POST['air_con'])){
$air_con=$_POST['air_con'];
}else {
  $air_con=-10;
}


$pickup_date=$_POST['pickup_date'];
$return_date=$_POST['return_date'];

if($model =="" || $air_con=="" || $pickup_date =="" || $return_date=="" || $air_con==-10   ){


echo "please fill all fields";


}

else {



$conn=mysqli_connect('localhost','root','','rental');
$sql="SELECT * FROM `car` WHERE status=1 AND airconditioned='$air_con' and manefacturing_company='$m1' and model='$m2' and model_year='$m3' ";
$query=mysqli_query($conn,$sql);
$car=mysqli_fetch_array($query);
if(!empty($car)){
$price=$car['price_per_day'];
$plate_id=$car['plate_id'];
}
if(!empty($car)){
$sql="UPDATE car set status=0 WHERE  plate_id='$plate_id' " ;
$query=mysqli_query($conn,$sql);

$sql="INSERT INTO reservation(user_id,plate_id,pickup_date,return_date,fee) VALUES('$user_id','$plate_id','$pickup_date','$return_date',datediff('$return_date','$pickup_date')*'$price') " ;
$query=mysqli_query($conn,$sql);


echo "success";
}
 else {

echo "no car with selected specs found try other specs";

}

mysqli_close($conn);
}
}
else {
  echo "please login";
}
 ?>
