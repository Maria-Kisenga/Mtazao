<?php
require('db_connect.php');
$utype="farmer";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Farmers</title>
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
		<li><a href="index.php#register" class="page-scroll">Register</a></li>
		<li><a href="logout.php" class="page-scroll">Logout</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<br/><br/><br/><br/><br/><br/>
<center>
<div class="form" style="width: 70%;">
<p><button><a style="text-decoration: none;font-family: 'Poppins', sans-serif;font-size: 15px;text-transform:capitalize; color: black;" href="messages.php">Messages</a></button> | <button><a style="text-decoration: none;font-family: 'Poppins', sans-serif;font-size: 15px;text-transform:capitalize; color: black;" href="farmers.php">Farmers</a></button> | <button><a style="text-decoration: none;font-family: 'Poppins', sans-serif;font-size: 15px;text-transform:capitalize; color: black;" href="buyers.php">Buyers</a></button> | <button><a style="text-decoration: none;font-family: 'Poppins', sans-serif;font-size: 15px;text-transform:capitalize; color: black;" href="orders.php">Orders</a></button> </p>

<br/>
<h4 style="text-transform: capitalize; font-family: 'Pacifico', cursive; color: black;">Farmers</h4>
<table width="100%" style="border-collapse:collapse; border: 3px solid #F7F7F7;">
<thead>
<tr>
<th align="center"><strong>Id</strong></th>
<th align="center"><strong>First Name</strong></th>
<th align="center"><strong>Last Name</strong></th>
<th align="center"><strong>Phone</strong></th>
<th align="center"><strong>Quantity of produce</strong></th>
<th align="center"><strong>Months with produce</strong></th>
<th align="center"><strong>County</strong></th>
<th align="center"><strong>Pick-up Address</strong></th>


</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from users WHERE utype ='$utype' ORDER BY id desc;";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td ><?php echo $count; ?></td>
<td ><?php echo $row["first_name"]; ?></td>
<td ><?php echo $row["last_name"]; ?></td>
<td ><?php echo $row["phone"]; ?></td>
<td ><?php echo $row["quantity"]; ?></td>
<td ><?php echo $row["season"]; ?></td>
<td ><?php echo $row["county"]; ?></td>
<td ><?php echo $row["address"]; ?></td>

<td ><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
<td ><a href="delete_farmer.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</center>
</body>