<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hello</title>
    <link rel="stylesheet" href="customer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>

<?php

session_start();
if(isset($_SESSION['user_name'])){
$user_name=$_SESSION['user_name'];
echo "<p>logged in as ".$user_name.=".</p>";

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



<h1> car reservation </h1>

<div class="div">


<form id="c_form" class="customer_form"  method="post">



<label for="">select model</label>
<select class="" name="model_select">
<option value="">select</option>

   <?php

 $conn=mysqli_connect('localhost','root','','rental');
 $sql="SELECT DISTINCT manefacturing_company,model,model_year FROM `car` WHERE status=1";
 $query=mysqli_query($conn,$sql);

while ( $models=mysqli_fetch_array($query)) {
echo '<option>'.$models['manefacturing_company']."   ".$models['model']."   ".$models['model_year'].'</option>';
}

?>
</select>





<br>
<label for="">Air conditioning</label>
<input type="radio" name="air_con" value="1">yes
<input type="radio" name="air_con" value="0">no
<br>
<label for="">enter pick up date  :</label>
 <input type="date" name="pickup_date" value="">

<label for="">enter return date   :</label>
<input type="date" name="return_date" value="">
<br>
<button type="submit" class="reservation_button" name="reservation_button">reserve</button>
<br>
<p id="response">Hello</p>
<br>
<a class="footer-link" href="login.php">login</a>

</form>

</div>


<script type="text/javascript">

  $(document).ready(function(){
    $('#c_form').submit(function(event) {
           event.preventDefault();
      $.ajax({

        type: "POST",
        url: "customer_submisson.php",
        data: $("#c_form").serialize(),
        success: function(response) {

          $("#response").html(response);

          if(response=="success"){

          window.location="rented.html";

        }
        }

      })

    });

  });
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>

</html>
