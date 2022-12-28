// posting usuing ajax

function validateForm() {
  var empty="";
  var x = document.forms["myform"]["name"].value;
  if (x == "") {
    alert("Name must be filled out");
  }

  var y = document.forms["myform"]["email"].value;
  if (y == "") {
    alert("email must be filled out");

  }

  var z = document.forms["myform"]["password"].value;
  if (z == "") {
    alert("password must be filled out");
    

  }
  var w = document.forms["myform"]["confirm_password"].value;
  if (w == "") {
    alert("confirm password must be filled out");

  }

  if (w !== z) {
    alert("password mis match ");
    return false;
  }
  if( x=="" || y=="" ||z=="" ||w=="")
  return false;

}
// email validation
function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");
document.myform.email.focus();
return false;
}
}
