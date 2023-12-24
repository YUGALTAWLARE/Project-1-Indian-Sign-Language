<?php
include "db.php";
if(!isset($_SESSION['userlog'])){
     header("location:index.php");
  }
   $sessid= $_SESSION['userlog'];
  $sqluser=mysqli_query($con,"select * from `register` where `id`='$sessid'");
  $row=mysqli_fetch_array($sqluser);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Indian Sign Language</title>
    <style>

.navbar-nav .nav-item a {
  font-weight:bold;
  padding:0px 20px 0px 20px;
  font-size:16px;
}
.navbar-nav .nav-item a:hover {
color:red;
text-decoration:;
background-color:black;
border-radius:20px;
}
nav{
background: #00b09b;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #96c93d, #00b09b);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #96c93d, #00b09b); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
nav{
	background:rgb(166 13 255)
}

#btnsave{
  display: inline-block;
   padding: 17px 27px;
   font-size: 16px;
   cursor: pointer;
   color: white;
   background-color: purple;
   border: none;
   -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  border-radius: 8px;
  box-shadow: 0 10px #998;
  margin:18px;

	}
#btntrain{
	 display: inline-block;
   padding: 17px 27px;
   font-size: 16px;
   cursor: pointer;
   color: white;
   background-color:  #002db3;
   border: none;
   -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  border-radius: 8px;
  box-shadow: 0 10px #998;
  margin:18px;
}
	p{
	color:white;
	}

</style>
	<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="stylebtn.css"/>
	<link rel="stylesheet" href="bckground.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg text-light navbar-light bg-success ">
            <a class="navbar-brand font-weight-bold" href="#">ISL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="outputmodule.php">Output Module<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="training.php">Training</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="guide.php">Guide Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="aboutproject.php">About project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="aboutus.php">About Us</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link text-white" href="logout.php">Logout</a>
                </li>
                </ul>
        </div>
    </nav>

