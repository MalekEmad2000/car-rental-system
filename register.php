<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title> sign up</title>
  <link rel="stylesheet" href="styles.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<body onload='document.myform.name.focus()'>


  <div class="top_div">
    <h1> 📝📝register📝📝 </h1>

  </div>



  <div class="middle_div">


      <form id="mform" name="myform" class=""  onsubmit="return validateForm()"  method="post">


      <input class="input" type="text" name="name"  placeholder="name">
      <br>
      <input class="input" type="text" name="email" placeholder="email">
      <br>
      <input class="input" type="password" name="password" placeholder="password">
      <br>
      <input class="input" type="password" name="confirm_password" placeholder="confirm password">
      <br>
      <button  class="button" type="submit" name="button" onclick="return ValidateEmail(document.myform.email)" >submit</button>
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
          url: "reg.php",
          data: $("#mform").serialize(),
          success: function(response) {

            $("#response").html(response);
            console.log("response");
            if(response =="inserted user succefully"){

            window.location="login.php";

          }

          }

        })

      });

    });
  </script>






  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="validation.js" charset="utf-8"></script>

</body>

</html>
