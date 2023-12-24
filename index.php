<?php include "db.php"; 

if(isset($_POST['submit'])){
	$email=$_POST['email1'];
	$password=$_POST['password1'];

	$sql=mysqli_query($con,"select * from `register` where `email`='$email' and `password`='$password'");
	$countmob=mysqli_num_rows($sql);
	$dbpassfetch=mysqli_fetch_array($sql);
	$password1=$dbpassfetch['password'];
	$id=$dbpassfetch['id'];
	if($countmob!=1){
		echo "<script>alert('Email is Not Registered With Us!! Please Register First.');</script>";
	}else if($email=="" || $password==""){
		echo $error="<script>alert('Please Enter All Fields!!');</script>";
	}else{
		$_SESSION['userlog']=$id;
		header('Location: outputmodule.php');
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
                <form class="box" method="post" action="">
				 <h4 style="color:white;">Indian Sign Language</h4>
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p> 
                    <input type="text" name="email1" placeholder="Email"> 
                    <input type="password" name="password1" placeholder="Password"> 
                    <input type="submit" name="submit" value="Login">
                    <a class="forgot text-muted" href="register.php"> Register Here!</a> 
                   
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>