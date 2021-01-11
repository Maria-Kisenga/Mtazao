<?php
require('db_connect.php');
if(isset($_POST['submit']))
{
$first_name =$_REQUEST['first_name'];
$last_name =$_REQUEST['last_name'];
$phone =$_REQUEST['phone'];
//$password = $_POST['password'];
$type =$_REQUEST['type'];
$quantity =$_REQUEST['quantity'];
$county =$_REQUEST['county'];
$address =$_REQUEST['address'];
$receipt_no=$_REQUEST['receipt_no'];
$utype='buyer';
$query="insert into users (`first_name`,`last_name`, `phone`, `county`, `address`, `utype`, `quantity`, `type`, `receipt_no`) values ('$first_name', '$last_name', '$phone', '$county', '$address', '$utype', '$quantity', '$type', '$receipt_no')";
mysqli_query($db,$query) or die(mysql_error());

 if ($query){
     echo "<center><span style='color: blue;'>Registered successfully</span></center>";
}
	else {
		echo "<center><span style='color: red;'>An error occurred</span></center>";
	}
}
?>

<html>
<head>
	<title>Buyer Registration</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Buyer</title>
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
<br /><br/><br />
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
	    <li><a href="index.php#page-top" class="page-scroll">Home</a></li>
        <li><a href="index.php#about" class="page-scroll">About</a></li>
        <li><a href="index.php#services" class="page-scroll">Services</a></li>
        <li><a href="index.php#contact" class="page-scroll">Contact</a></li>		
		<li><a href="login.php" class="page-scroll">Login</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<center>
	<form method="POST" action="" style= "width: 36%; border: #E5E5E5 1px solid;">
		<fieldset style="padding: 20px;">
			<legend>Make an Order</legend>
		<span class="required">*</span><label for="first_name">First Name: </label><input type="text" name="first_name" required /><br /></br/>
		<span class="required">*</span><label for="last_name">Last Name: </label><input type="text" name="last_name" required /><br /></br/>
		<span class="required">*</span><label for="phone">Phone Number: </label><input type="number" name="phone" placeholder="e.g 07.." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10" required /><br /></br/>		
		<span class="required">*</span><label for="type">Type of good: </label>
<select name="type" id="type">
		<option>Select an option below:</option>
		<option value="Ripe">Ripe</option>
		<option value="Unripe">Unripe</option>
		</select><br/><br/>
		
		<p style="font-size: 15px; color: blue; float:right;">Ripe (Yellow bananas): <strong/>Ksh 90 per kg</strong><br/>Unripe (Green bananas): <strong>Ksh 80 per kg</strong></p><br/><br/><br/>
		
		<span class="required">*</span><label for="quantity">Quantity of Purchase: </label><input type="number" name="quantity" id="num1" required /> (Kg)<br /><br/>
		
		<br/>
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
			</select><br /></br/>	
			
		<span class="required">*</span><label for="address">Pick-up address of goods: </label><textarea type="text" name="address" required cols="30" rows="3"></textarea><br /><br /><br/>
		
		<p style="font-size: 15px; color: blue; float:right;">LIPA na MPESA to <strong>till number: 569874 </strong> then enter the receipt number at the beginning of the MPESA message in the field below</p>
		
		<br/><br/>
		<span class="required">*</span><label for="receipt_no">MPESA Receipt No: </label><input type="text" name="receipt_no" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10" required /><br /><br />
		
		<center>
			<input type="reset" name="clear" value="Clear"><input type="submit" value="Register" name="submit">
			</center>
		</fieldset>
	</form>
	<button onclick="total()">Total cost </button><br/><p id="result" style="font-size: 15px; color: blue; float:right;"></p>
	</center>


<script>
function total(){
	var field1 = document.getElementById("num1").value;
	
	var str = document.getElementById("type");
    var str2 = str.options[str.selectedIndex].value;
	
	if(str2=="Ripe"){
		var field2 = 90;
	}else{
		var field2 = 80;
	}
	
	var total=parseFloat(field1)*parseFloat(field2);
	
	if(!isNaN(total)){
		document.getElementById("result").innerHTML="Total cost to send is: "+total;
	}	
}
</script>
</body>
</html>	
