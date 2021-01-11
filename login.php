<?php
session_start();
require('db_connect.php');
$status="";	
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){	
	$first_name = $_REQUEST['first_name'];  
	$password = $_REQUEST['password'];

$query = mysqli_query($db, "SELECT * FROM users WHERE first_name='$first_name' AND password='$password'");	
$row = mysqli_fetch_array($query);
$type=$row['utype'];

$is_exist = mysqli_query($db, "SELECT * FROM users WHERE first_name='$first_name' AND password='$password'");
$check_user = mysqli_num_rows($is_exist);

if($check_user==1){
	$_SESSION["first_name"] = $row["first_name"];
	$_SESSION["utype"] = $row["utype"];
	
	if($type=="admin"){
		echo "<script>window.open('admin.php', '_self')</script>";
	}else if($type=="farmer"){
		//echo "<script>window.open('farmer_update.php', '_self')</script>";
		$status = "<span style='color:red;'>You are not authorized to perform this action</span>";
	}else{
		//"<script>window.open('buyer_update.php', '_self')</script>";
		$status = "<span style='color:red;'>You are not authorized to perform this action</span>";
	}
}else{
	echo "Invalid first name or password";
}
	}
	
?>

<html>
<head>
	<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mtazao</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
<link rel="icon" href="img/icon.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top"><i class="fa fa-leaf"></i> <b>Mtazao</b></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="index.php#page-top" class="page-scroll">Home</a></li>
        <li><a href="index.php#about" class="page-scroll">About</a></li>
        <li><a href="index.php#services" class="page-scroll">Services</a></li>
        <li><a href="index.php#contact" class="page-scroll">Contact</a></li>		
		<li><a href="index.php#register" class="page-scroll">Register</a></li>
		<!--<li><a href="login.php" class="page-scroll">Login</a></li>-->
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<center>
<br/><br/>
	<form method="POST" action="" >
	<br /><br /><br /><br /><br /><br />
  <fieldset style="width: 30%; border: 1px #E5E5E5 solid; padding:20px;">
    <legend>Login Below</legend>
      <span class="required">*</span> <label for="first_name">First Name: </label> <input type="text" name="first_name" required /><br /><br />
      <span class="required">*</span> <label for="password">Password: </label> <input type="password" name="password" required /><br /><br /> 
      <input type="submit" value="Login" name="submit" class="btn btn-custom btn-lg page-scroll" style="margin-left:10px; height:3em;">
   </fieldset>
   <?php echo $status;?>
 </form>
 </center>
</body>
</html>

