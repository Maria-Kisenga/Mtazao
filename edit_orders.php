<?php
require('db_connect.php');
$id=$_REQUEST['id'];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($db, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />
<style>input[type="submit"]:hover{background-color:#dfdfdf;}</style>
</head>
<body>
<br><br>
<center>
<div class="form" style="width:40%;">
<p><button><a style="text-decoration: none;font-family: 'Poppins', sans-serif;font-size: 15px;text-transform:capitalize; color: black;" href="messages.php">Messages</a></button> | <button><a style="text-decoration: none;font-family: 'Poppins', sans-serif;font-size: 15px;text-transform:capitalize; color: black;" href="farmers.php">Farmers</a></button> | <button><a style="text-decoration: none;font-family: 'Poppins', sans-serif;font-size: 15px;text-transform:capitalize; color: black;" href="buyers.php">Buyers</a></button> | <button><a style="text-decoration: none;font-family: 'Poppins', sans-serif;font-size: 15px;text-transform:capitalize; color: black;" href="orders.php">Orders</a></button> </p>
<h1>Update Record</h1>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$first_name =$_REQUEST['first_name'];
$last_name =$_REQUEST['last_name'];
$phone =$_REQUEST['phone'];
$quantity =$_REQUEST['quantity'];
$season =$_REQUEST['season'];
$county =$_REQUEST['county'];
$address =$_REQUEST['address'];
$utype =$_REQUEST['utype'];
$type =$_REQUEST['type'];
$receipt_no =$_REQUEST['receipt_no'];

$update="update users set first_name='".$first_name."', last_name='".$last_name."', phone='".$phone."', password='".$password."', county='".$county."', address='".$address."', quantity='".$quantity."', season='".$season."', utype='".$utype."', type='".$type."', receipt_no='".$receipt_no."' where id='".$id."'";
mysqli_query($db, $update) or die(mysqli_error());
echo "<center><span style='color:blue;'>Record updated</span></center>";
}else {
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="first_name" placeholder="Enter new first name" required value="<?php echo $row['first_name'];?>"/></p>
<p><input type="text" name="last_name" placeholder="Enter new last name" required value="<?php echo $row['last_name'];?>"/></p>
<p><input type="number" name="phone" placeholder="Enter new number" required value="<?php echo $row['phone'];?>"/></p>
<p><input type="number" name="quantity" placeholder="Enter new quantity" required value="<?php echo $row['quantity'];?>"/></p>
<p><input type="text" name="season" placeholder="Enter new season" required value="<?php echo $row['season'];?>"/></p>
<p><input type="text" name="county" placeholder="Enter new address" required value="<?php echo $row['address'];?>"/></p>
<p><input type="text" name="utype" placeholder="Enter new user type" required value="<?php echo $row['utype'];?>"/></p>
<p><input type="text" name="type" placeholder="Enter new type" required value="<?php echo $row['type'];?>"/></p>
<p><input type="text" name="type" placeholder="Enter new receipt number" required value="<?php echo $row['receipt_no'];?>"/></p>
<p><input style="background: #FFD27F;"  class="btn btn-custom btn-lg page-scroll" name="submit" type="submit" value="Update"/></p>
</form>
<?php } ?>

</div>
</div>
</center>
</body>
</html>
