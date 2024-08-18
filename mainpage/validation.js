function userlogin(form)
{
 if(form.userid.value == "xyz@gmail.com" && form.usrpsw.value == "123")
  {
    window.open('/main page/login.php')
  }
 else
 {
   alert("PASSWORD SHI SE LIKH GLT H ")
  }
}