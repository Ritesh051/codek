function userlogin(form)
{
 if(form.userid.value == "xyz@gmail.com" && form.usrpsw.value == "Set Your password")
  {
    window.open('/main page/login.php')
  }
 else
 {
   alert("Incorrect Password ")
  }
}