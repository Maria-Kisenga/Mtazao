<?php
$db = mysqli_connect('localhost', 'root', '');
if (!$db){
    die("Connection to database failed" . mysqli_error($db));
}
$select_db = mysqli_select_db($db, 'mtazao');
if (!$select_db){
    die("Database selection failed" . mysqli_error($db));
}