<?php
require('db_connect.php');

$id=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
header("Location: farmers.php");
?>