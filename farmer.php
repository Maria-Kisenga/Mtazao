<html>
<head>
	<title>Farmer Registration</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Farmer</title>
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
<link rel="stylesheet" type="text/css"  href="css/style1.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
</head>
<br/> <br/>
<body style= "width: 60%;" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
	    <li><a href="index.php#page-top" class="page-scroll">Home</a></li>
        <li><a href="index.php#about" class="page-scroll">About</a></li>
        <li><a href="index.php#services" class="page-scroll">Services</a></li>
        <li><a href="index.php#contact" class="page-scroll">Contact</a></li>
		<li><a href="index.php#register" class="page-scroll">Register</a></li>
		<li><a href="login.php" class="page-scroll">Login</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<br/><br/>
<center>
	<form method="POST" action="" style= "width: 36%; border: #FFD27F 1px solid;">
		<fieldset style="padding: 20px;">
			<legend>Farmer Registration</legend>
		<span class="required">*</span><label for="first_name">First Name: </label><input type="text" name="first_name" required /><br /></br/>
		<span class="required">*</span><label for="last_name">Last Name: </label><input type="text" name="last_name" required /><br /></br/>
		<span class="required">*</span><label for="phone">Phone Number: </label><input type="number" name="phone" placeholder="e.g 07.." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10"  required /><br /></br/>
	<!--<span class="required">*</span><label for="password">Password: </label><input type="password" name="password" required /><br /><br/>-->
		<span class="required">*</span><label for="quantity">Quantity of Produce: </label><input type="number" name="quantity" required min="5"/> (kg)<br /></br/>		
		<span class="required">*</span><label for="season">Months you have produce: </label>
		<div style="float:right;">
<input type="checkbox" name="season[]" value="january">January
<input type="checkbox" name="season[]" value="february">February
<input type="checkbox" name="season[]" value="march">March
<input type="checkbox" name="season[]" value="april">April
<input type="checkbox" name="season[]" value="may">May
<input type="checkbox" name="season[]" value="june">June
<input type="checkbox" name="season[]" value="july">July
<input type="checkbox" name="season[]" value="august">August
<input type="checkbox" name="season[]" value="september">September
<input type="checkbox" name="season[]" value="october">October
<input type="checkbox" name="season[]" value="november">November
<input type="checkbox" name="season[]" value="december">December
</div>
 <br/><br/><br/><br/>
<span class="required">*</span><label for="county">County: </label>
<select name="county">
		<option>Select an option below:</option>
		<option value="Kisumu">Kisumu</option>
		<option value="Nairobi">Nairobi</option>
		<option value="Mombasa">Mombasa</option>
		<option value="Eldoret">Eldoret</option>
		<option value="Taveta">Taveta</option>
		<option value="Lamu">Lamu</option>
		<option value="Isiolo">Isiolo</option>
		<option value="Malindi">Malindi</option>
			</select><br /></br/>	<br/>
		<span class="required">*</span><label for="address">Pick-up address of goods: </label><textarea type="text" name="address" required cols="30" rows="3"></textarea><br /><br /><br />
		<center>
			<input type="reset" name="clear" value="Clear"><input type="submit" value="Register" name="submit">
			</center>
		</fieldset>
	</form>
	</center>
</body>
</html>	

<?php
require('db_connect.php');
if(isset($_POST['submit']))
{
$first_name =$_REQUEST['first_name'];
$last_name =$_REQUEST['last_name'];
$phone =$_REQUEST['phone'];
//$password = md5($_POST['password']);
$quantity =$_REQUEST['quantity'];
$season =implode(', ', $_POST['season']);
$county =$_REQUEST['county'];
$address =$_REQUEST['address'];
$utype= 'farmer';
$query="insert into users (`first_name`,`last_name`, `phone`, `quantity`, `season`, `county`, `address`, `utype`) values ('$first_name', '$last_name', '$phone', '$quantity', '$season', '$county', '$address', '$utype')";
mysqli_query($db,$query) or die(mysql_error());

 if ($query){
     echo "<center><span style='color: blue;'>User registered successfully</span></center>";
}
	else {
		echo "<center><span style='color: red;'>Error registering user</span></center>";
	}
}
?>