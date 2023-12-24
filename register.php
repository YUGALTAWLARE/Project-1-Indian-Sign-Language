<?php 
include "db.php";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
$sql=mysqli_query($con,"select * from `register` where `email`='$email'");
$count=mysqli_num_rows($sql);
if($count>=1){
    echo "<script>alert('User Already Registered With This Email!!')</script>";
}else{
    $sql1= "INSERT INTO `register`(`name`, `email`, `mobile`, `password`) VALUES ('$name','$email','$mobile','$password')";
    $data= mysqli_query($con,$sql1);
	if($sql1){
    echo "<script>alert('User Registered Successfully!!')</script>";
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box" method="post" action="" onsubmit="return validateForm();">
                    <h1>Register</h1>
                    <p class="text-muted"> Please enter your login and password!</p> 
                    <input type="text" name="name" placeholder="Name" required> 
                    
                    <input type="text" id="email" name="email" placeholder="Email" onkeyup="validateEmail()" required>
                    <span id="emailalert" class="text-danger font-weight-bold"></span> 
                    
                    <input type="text" id="mobile" name="mobile" placeholder="Mobile Number" onkeyup="validateMobile()" required> 
                    <span id="mobilealert" class="text-danger font-weight-bold"></span>
                    
                    <input type="date" name="dob" placeholder="Date Of Birth" required> 
                   
                    <input type="password" id="password" name="password" placeholder="Password" onblur="validateCpassword()" required>
                    <span id="passalert" class="text-danger font-weight-bold"></span>
                    
                    <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" onblur="validateCpassword()" onkeyup="validateCpassword()" required> 
                    <span id="conpassalert" class="text-danger font-weight-bold"></span>
                    
                    <input type="submit" name="submit" value="Register" href="#">
                    <a class="forgot text-muted" href="index.php"> Login Here!</a>
                   
                </form>
            </div>
        </div>
    </div>
</div>
<script>
//validation
        function validateEmail(){
            var email=document.getElementById("email");

            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
        if (!filter.test(email.value)) {  
            document.getElementById("emailalert").innerHTML='Please provide a valid email address';
            email.focus;  
            return false;  
        }else{
          document.getElementById("emailalert").innerHTML="<span style='color:green'>Valid!!</span>";
          return true;
        }  
        }

        function validateMobile(){
          var mobile=document.getElementById("mobile").value;
          var filter =/^\d{10}$/;
          if (!filter.test(mobile)) {  
            document.getElementById("mobilealert").innerHTML='!Please provide a valid Mobile Number';
            mobile.focus;  
            return false; 
          }else{
            document.getElementById("mobilealert").innerHTML="<span style='color:green;font-weight:bold;margin:10px 0px 0px 15px;'>Valid!!</span>";
            return true;
          }
        }
        function validateCpassword(){
//conpass pass
          var pass=document.getElementById("password").value;
          var conpass=document.getElementById("cpassword").value;
          if(pass!=conpass){
              document.getElementById("conpassalert").innerHTML="Password Not Match!!";
              return false;

          }else if(pass==""){
              document.getElementById("passalert").innerHTML="Password Sholud Not Be Blank!!";
              return false;
          }else if(conpass==""){
              document.getElementById("conpassalert").innerHTML="Confirm Password Sholud Not Be Blank!!";
              return false;
          }else if(pass==conpass){
              document.getElementById("conpassalert").innerHTML="<span style='color:green'>Password Match!!</span>";
              return true;
          }
                  }
function validateForm(){
    return validateCpassword() && validateMobile() && validateEmail();
    
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>