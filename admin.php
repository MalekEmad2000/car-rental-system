<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>admin</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>
  <link rel="stylesheet" href="admin.css">
  <body>
    <a class="footer-link" href="login.php">login</a>
    <?php

    session_start();
    if(isset($_SESSION['user_name'])){
    $user_id=$_SESSION['user_name'];
    echo "<p>logged in as ".$user_id.=".</p>";

    }else {
      echo "<p>   please login  </p>";
    }



    ?>
    <div class="">
    <form id="logout" name="logout" method="post">
        <input type="submit" name="logout" value="logout">
    </form>
    </div>
    <?php

    if (isset($_POST['logout'])) {
      unset($_SESSION['user_name']);
      unset($_SESSION['user_id']);
      header("Refresh:0");
    }




     ?>



    <h1>admin</h1>
<div class="div">


<form id="add_car" class="form1" action="index.html" method="post">
  <input type="text" name="car_model" value="" placeholder="enter car model">
  <br>
  <input type="text" name="car_type" value="" placeholder="enter car company">
  <br>
  <input type="text" name="plate_id" value="" placeholder="enter plate number">
  <br>
  <input type="text" name="price_per_day" value="" placeholder="enter price per day">
  <br>
    <input type="text" name="model_year" value="" placeholder="enter model_year">
  <br>
  <label for="">Air conditioning</label>
  <input type="radio" name="air_con" value="1">yes
  <input type="radio" name="air_con" value="0">no
<br>

<button type="submit" name="add_car_button">add car</button>
<br>
<p id="response"></p>

</form>

</div>
<script type="text/javascript">

  $(document).ready(function(){
    $('#add_car').submit(function(event) {
           event.preventDefault();
      $.ajax({

        type: "POST",
        url: "admin_submisson.php",
        data: $("#add_car").serialize(),
        success: function(response) {

          $("#response").html(response);


        }

      })

    });

  });
</script>

<div  class="middle">
  <form id="advanced "class=""  method="post">

    <label for="">enter search word</label>
    <input type="text" name="search" placeholder="">
    <br>
    <input type="submit" name="submit" value="search">


<?php
if(isset($_POST['submit'])){

if(isset($_SESSION['user_id'])){

$search_key=$_POST["search"];

$conn=mysqli_connect('localhost','root','','rental');
$sql="SELECT DISTINCT *
FROM system_user NATURAL  JOIN reservation NATURAL  JOIN car
WHERE user_id='$search_key' or plate_id='$search_key' or pickup_date='$search_key'or return_date='$search_key' or fee='$search_key'or email='$search_key'or user_name='$search_key' or pass='$search_key' or fee='$search_key' or manefacturing_company='$search_key'
or model='$search_key'  or price_per_day='$search_key'  ";
$query=mysqli_query($conn,$sql);

$result =$conn -> query($sql);
if($result -> num_rows >0){
echo "<h2>reservations</h1>";
echo "    <table>
      <tr>
        <th>plate_id</th>
        <th>user_id</th>
        <th>email</th>
        <th>name</th>
        <th>pass</th>
        <th>admin</th>
        <th>pick_date</th>
        <th>ret_date</th>
        <th>fee</th>
        <th>company</th>
        <th>model</th>
        <th>aircond</th>
        <th>status</th>
        <th>price_per_day</th>


      </tr>";

while ($tuples=mysqli_fetch_array($query))
  echo "<tr><td>".$tuples['plate_id']."</td><td>".$tuples['user_id']."</td><td>".$tuples['email']."</td><td>".$tuples['user_name']."</td><td>".$tuples['pass']."</td><td>".$tuples['admin']."</td><td>".$tuples['pickup_date']."</td><td>".$tuples['return_date'].
  "</td><td>".$tuples['fee']."</td><td>".$tuples['manefacturing_company']."</td><td>".$tuples['model']."</td><td>".$tuples['airconditioned']."</td><td>".$tuples['status']."</td><td>".$tuples['price_per_day']."</td></tr>";



echo "</table>";


}



          $sql1="SELECT  *
          FROM  car
          WHERE   plate_id NOT IN(SELECT plate_id FROM reservation) AND  ( plate_id='$search_key'or model='$search_key' or manefacturing_company='$search_key'  or price_per_day='$search_key' )";
          $query1=mysqli_query($conn,$sql1);
          $result =$conn -> query($sql1);
          if($result -> num_rows >0){
            echo "<h2>car</h1>";
            echo " <table>
                  <tr>
                    <th>plate_id</th>
                    <th>company</th>
                    <th>model</th>
                    <th>aircond</th>
                    <th>status</th>
                    <th>price_per_day</th>
                    </tr>";



                    while ($tuples=mysqli_fetch_array($query1))
                      echo "<tr><td>".$tuples['plate_id']."</td><td>".$tuples['manefacturing_company']."</td><td>".$tuples['model']."</td><td>".$tuples['airconditioned']."</td><td>".$tuples['status']."</td><td>".$tuples['price_per_day']."</td></tr>";
                      echo "</table>";


                                     }
        $sql2="SELECT  *
         FROM  system_user
         WHERE   user_id NOT IN(SELECT user_id FROM reservation) AND  ( user_id='$search_key' or email='$search_key'  or user_name='$search_key'or pass='$search_key' )";
         $query2=mysqli_query($conn,$sql2);
         $result2 =$conn -> query($sql2);
        if($result2 -> num_rows >0){
         echo "<h2>user</h1>";
         echo " <table>
          <tr>
        <th>user_id</th>
        <th>email</th>
        <th>user_name</th>
        <th>pass</th>
        <th>admin</th>
        </tr>";



              while ($tuples=mysqli_fetch_array($query2))
              echo "<tr><td>".$tuples['user_id']."</td><td>".$tuples['email']."</td><td>".$tuples['user_name']."</td><td>".$tuples['pass']."</td><td>".$tuples['admin']."</td></tr>";
             echo "</table>";


                                                                }

mysqli_close($conn);



}
}

 ?>


  </form>

</div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>

</html>
