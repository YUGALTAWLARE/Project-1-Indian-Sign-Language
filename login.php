<?php 
include "db.php"; 

if(isset($_POST['submit'])){
	 $email=$_POST['email1'];
	 $password1=$_POST['password1'];
	$sql=mysqli_query($con,"select * from `register` where `email`='$email' and `password`='$password1'");
	 echo $countmob=mysqli_num_rows($sql);
	 $dbpassfetch=mysqli_fetch_array($sql);
	 $password=$dbpassfetch['password'];
	 $id=$dbpassfetch['id'];
	 if($countmob!=1){
		echo "<script>alert('Email is Not Registered With Us!! Please Register First.');</script>";
	 }else if($email=="" || $password==""){
		 echo $error="<script>alert('Please Enter All Fields!!');</script>";
	 }else{
		 $_SESSION['userlog']=$id;
		 header('Location: dashboard.php');
		}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form method="post" action="">
		<input type="email" name="email1">
		<input type="password" name="password1">
		<input type="submit" name="submit">
		</form>
</body>
</html>