
<?php session_start(); ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
   <meta charset="utf-8">
   <title>login</title>
   <link rel="stylesheet" href="styles.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 </head>

 <body>

   <h1> login</h1>

   <div class="middle_div login">


     <form id="mform" name="myform"   onsubmit="return validateForm()" class="login_form" method="post" >



       <input class="input" type="text" name="email" placeholder="email">
       <br>
       <input class="input" type="password" name="password" placeholder="password">
       <br>
       <button id="trial" class="button" type="submit" name="button_login" onclick="return ValidateEmail(document.myform.email)" >submit</button>
       <br>
       <p id="response"></p>

     </form>

   </div>

   <script type="text/javascript">

     $(document).ready(function(){
       $('#mform').submit(function(event) {
              event.preventDefault();
         $.ajax({

           type: "POST",
           url: "try.php",
           data: $("#mform").serialize(),
           success: function(response) {

             $("#response").html(response);

             if(response==1){

             window.location="admin.php";

           }
           else if(response==0) {

             window.location="customer.php";
           }
           }

         })

       });

     });
   </script>



   <div class="bottom-container">

     <a class="footer-link" href="register.php">register</a>

     <p style="color:white;">© 2021.</p>

   </div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="validation.js" charset="utf-8"></script>
 </body>

 </html>
